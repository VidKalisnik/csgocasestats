<?php

include 'conn.php';

$len = 0;
$povprecje = 0;
$colors = ['Blue','Purple','Pink','Red'];
$colorsProcent = [0.7992,0.1598,0.0319,0.0064,0.0026];

$blueAvg = [];
$purpleAvg = [];
$pinkAvg = [];
$redAvg = [];

for($i=1;$i<36;$i++){ //za case

    for($j=0;$j<4;$j++){    // za use barve

        $result = mysqli_query($conn, 
            "SELECT povprecje FROM skins  WHERE case_id = $i AND color = '$colors[$j]'"
        );

        while($row = $result->fetch_assoc()) {
            ++$len;
            $povprecje += $row["povprecje"];
        };

        $povprecje = $povprecje / $len;

        if($j == 0){
            $povprecje = $povprecje*$colorsProcent[0];
            array_push($blueAvg,$povprecje);
        }elseif($j == 1){
            $povprecje = $povprecje*$colorsProcent[1];
            array_push($purpleAvg,$povprecje);
        }elseif($j == 2){
            $povprecje = $povprecje*$colorsProcent[2];
            array_push($pinkAvg,$povprecje);
        }elseif($j == 3){
            $povprecje = $povprecje*$colorsProcent[3];
            array_push($redAvg,$povprecje);
        };

        $len = 0;
        $povprecje = 0;

    };

    $collection = mysqli_fetch_array(mysqli_query($conn,
        "SELECT collection_id FROM cases WHERE case_id = $i"
    ));

    $collectionAvg = mysqli_fetch_array(mysqli_query($conn,
        "SELECT povprecje FROM collections WHERE collection_id = $collection[0]"
    ));

    $collectionAvg = $collectionAvg[0]*$colorsProcent[4];

    $caseAvg = $blueAvg[$i-1] + $purpleAvg[$i-1] + $pinkAvg[$i-1] + $redAvg[$i-1] + $collectionAvg;

    echo $caseAvg."<br>";

    $sql = "UPDATE cases SET povprecje='$caseAvg' WHERE case_id='$i'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully". "<br>";
    } else {
      echo "Error updating record: " . $conn->error;
    };
    
    //za return rate
    
    $price = mysqli_fetch_array(mysqli_query($conn,
        "SELECT price FROM cases WHERE case_id = $i"
    ))[0];
    
    $caseAvg = ($caseAvg / ($price + 2.49))*100;
    
    $sql = "UPDATE cases SET returnRate='$caseAvg' WHERE case_id='$i'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully". "<br>";
    } else {
      echo "Error updating record: " . $conn->error;
    };
};
?>