<?php

include 'conn.php';

set_time_limit(0);

// dobi id od skina

    $sql = "SELECT spitems FROM daily";
    $result = mysqli_query($conn, $sql);
    $skinId = mysqli_fetch_array($result);

    $skinId = $skinId[0];

for($j = 1; $j <= 20; $j++ ){
// dobi ime weapon-a

    $sql = "SELECT spType FROM specialitems WHERE id=$skinId;";
    $result = mysqli_query($conn, $sql);
    $type = mysqli_fetch_array($result)[0];

// dobi ime skin-a

    $sql = "SELECT specialItem FROM specialitems WHERE id=$skinId;";
    $result = mysqli_query($conn, $sql);
    $specialItem = mysqli_fetch_array($result)[0];
    
// dobi ime skin-a

    $sql = "SELECT spName FROM specialitems WHERE id=$skinId;";
    $result = mysqli_query($conn, $sql);
    $name = mysqli_fetch_array($result)[0];    

// Ker za pridobitev cene posameznega skin-a rabimo posebni URL  moramo presledek spremenit v %20 itd.

    $replacements = array(" " => "%20","'" => "%27", "(" => "%28", ")" => "%29"  );
    
    echo $specialItem."-".$type."-".$name."-";
    if($specialItem == "Bayonet" or $specialItem == "M9 Bayonet" or $specialItem== "Shadow Daggers" or $specialItem== "Karambit"){
      if($name == "Vanilla"){
        $skupi = strtr($specialItem,$replacements);
      }else{
        $skupi = strtr($specialItem,$replacements)."%20|%20".strtr($name,$replacements);
      };
    }else{
      if($name == "Vanilla"){
        $skupi = strtr($specialItem,$replacements)."%20".strtr($type,$replacements);
      }else{
        $skupi = strtr($specialItem,$replacements)."%20".strtr($type,$replacements)."%20|%20".strtr($name,$replacements);
      };
    };

    $conditionsURL = ["%20(Factory%20New)", "%20(Minimal%20Wear)","%20(Field-Tested)","%20(Well-Worn)","%20(Battle-Scarred)"];

    $conditions = ["FactoryNew","MinimalWear","FieldTested","WellWorm","BattleScared"];

    // Naredi za vse conditione
    
        for($i=0;$i<5;$i++){
    
          if($name == "Vanilla"){
            $filename_1     =       "http://csgobackpack.net/api/GetItemPrice/?id=★%20".$skupi;
          }else{
            $filename_1     =       "http://csgobackpack.net/api/GetItemPrice/?id=★%20".$skupi.$conditionsURL[$i];
          };

            $data_1         =       file_get_contents($filename_1);
            $array_1        =       json_decode($data_1, true);
          
            $lowest_price_1 =       $array_1["average_price"];
            $d1        =       strtr("$lowest_price_1","$"," ");
            
            echo $skupi.$conditionsURL[$i]."--".$d1;
            
          
        // če je napaka prejsne cene ne izbrise ampak vzame isto
            if(is_numeric($d1)){
              echo "nice";
            }else {
              $sql = "SELECT $conditions[$i] FROM specialitems WHERE id=$skinId;";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_fetch_array($result);
          
              $d1 = $resultCheck[0];
            echo "fejk".$d1;
            };
        
        //posodobi  ceno
        
            $sql = "UPDATE specialitems SET $conditions[$i]='$d1' WHERE id=$skinId";
          
            if ($conn->query($sql) === TRUE) {
              echo "NICE";
            } else {
              echo "Error updating record: " . $conn->error;
            };
          };

    $conditions = ["FactoryNewSt","MinimalWearSt","FieldTestedSt","WellWormSt","BattleScaredSt"];

// ST 

    for($i=0;$i<5;$i++){

      if($name == "Vanilla"){
        $filename_1     =       "http://csgobackpack.net/api/GetItemPrice/?id=★%20StatTrak™%20".$skupi;
      }else{
        $filename_1     =       "http://csgobackpack.net/api/GetItemPrice/?id=★%20StatTrak™%20".$skupi.$conditionsURL[$i];
      };

        $data_1         =       file_get_contents($filename_1);
        $array_1        =       json_decode($data_1, true);
      
        $lowest_price_1 =       $array_1["average_price"];
        $d1        =       strtr("$lowest_price_1","$"," ");
          
        echo $skupi.$conditionsURL[$i]."--".$d1;
      
    // če je napaka prejsne cene ne izbrise ampak vzame isto
        if(is_numeric($d1)){
          echo "nice";
        }else {
          $sql = "SELECT $conditions[$i] FROM specialitems WHERE id=$skinId;";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_fetch_array($result);
      
          $d1 = $resultCheck[0];
          echo "fejk".$d1;
        };
    
    //posodobi  ceno
    
        $sql = "UPDATE specialitems SET $conditions[$i]='$d1' WHERE id=$skinId";
      
        if ($conn->query($sql) === TRUE) {
          echo "NICE";
        } else {
          echo "Error updating record: " . $conn->error;
        };
      };

    $skinId += 1;

    if($skinId == 410){
      $skinId = 1;
    };

    echo "-----".$j."-----";
    
};
    
    $sql = "UPDATE daily SET spitems='$skinId'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    };

?>