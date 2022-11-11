<?php

include 'conn.php';

$caseId = mysqli_fetch_array(mysqli_query($conn,
    "SELECT cases FROM daily"
))[0];

for($i=0;$i<5;$i++){ // 5 caseou

    $case = mysqli_fetch_array(mysqli_query($conn,
        "SELECT case_name FROM cases WHERE case_id = $caseId"
    ))[0];

    $zamenjava = array(" " => "%20",":"=>"%3A");

    $caseURL = strtr($case,$zamenjava);

    
    $filename = "https://steamcommunity.com/market/priceoverview/?appid=730&currency=1&market_hash_name=".$caseURL;
    $data = file_get_contents($filename);
    $array = json_decode($data, true);

    //str_replace zto k ubistvu odstran ne pa zamenja
    $price = str_replace("$","",$array["lowest_price"]);
    $volume = str_replace(",","",$array['volume']);

    $caseAvg = mysqli_fetch_array(mysqli_query($conn,
        "SELECT povprecje FROM cases WHERE case_id = $caseId"
    ))[0]; 

    $caseAvg = ($caseAvg / ($price + 2.49))*100;

    $zamenjava = array(" Case"=>"",":"=>""," "=>"");
    $case =strtolower(strtr($case,$zamenjava));

    $datum = date("Y/m/d");

    // posodobi cases table zto d loh podatke po vrsti 
    
    $sql = "UPDATE cases 
            SET returnRate='$caseAvg', price='$price',volume='$volume' 
            WHERE case_id = $caseId";
      
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully <br>";
    } else {
        echo "Error updating record: " . $conn->error;
    };

    //vsako posebi da v svojo tabelo - za grafe

    $sql = "INSERT INTO $case(datum,price,volume,returnPro) VALUES ('$datum','$price','$volume','$caseAvg')";

    if ($conn2->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    };

    $caseAvg = 0;

    // da bojo pol druge pa d k pride do 34 gre spet od 1
    ++$caseId;

    if($caseId == 36){
        $caseId = 1;

        $sql = "UPDATE daily SET cases='$caseId'";
      
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        };

        break;
    };

    $sql = "UPDATE daily SET cases='$caseId'";
      
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully <br>";
    } else {
        echo "Error updating record: " . $conn->error;
        };
};

?>