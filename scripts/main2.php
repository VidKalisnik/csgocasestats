<?php

include 'conn.php';

set_time_limit(0);

// dobi id od skina

    $sql = "SELECT skins2 FROM daily";
    $result = mysqli_query($conn, $sql);
    $skinId = mysqli_fetch_array($result);

    $skinId = $skinId[0];

for($j = 1; $j <= 20; $j++ ){
// dobi ime weapon-a

    $sql = "SELECT weapon FROM skins WHERE skin_id=$skinId;";
    $result = mysqli_query($conn, $sql);
    $weapon = mysqli_fetch_array($result);

// dobi ime skin-a

    $sql = "SELECT weapon_skin FROM skins WHERE skin_id=$skinId;";
    $result = mysqli_query($conn, $sql);
    $weaponSkin = mysqli_fetch_array($result);

// Ker za pridobitev cene posameznega skin-a rabimo posebni URL  moramo presledek spremenit v %20 itd.

    $replacements = array(" " => "%20","'" => "%27", "(" => "%28", ")" => "%29"  );
    $skupi = strtr($weapon[0],$replacements)."%20|%20".strtr($weaponSkin[0],$replacements);
    $conditionsURL = ["%20(Factory%20New)", "%20(Minimal%20Wear)","%20(Field-Tested)","%20(Well-Worn)","%20(Battle-Scarred)"];

    $conditions = ["FactoryNew","MinimalWear","FieldTested","WellWorm","BattleScared"];

    // Naredi za vse conditione
    
        for($i=0;$i<5;$i++){
    
            $filename_1     =       "http://csgobackpack.net/api/GetItemPrice/?id=".$skupi.$conditionsURL[$i];
            $data_1         =       file_get_contents($filename_1);
            $array_1        =       json_decode($data_1, true);
          
            $lowest_price_1 =       $array_1["average_price"];
            $d1        =       strtr("$lowest_price_1","$"," ");
            
            echo $skupi.$conditionsURL[$i]."--".$d1;
            
          
        // če je napaka prejsne cene ne izbrise ampak vzame isto
            if(is_numeric($d1)){
              echo "nice";
            }else {
              $sql = "SELECT $conditions[$i] FROM skins WHERE skin_id=$skinId;";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_fetch_array($result);
          
              $d1 = $resultCheck[0];
            echo "fejk".$d1;
            };
        
        //posodobi  ceno
        
            $sql = "UPDATE skins SET $conditions[$i]='$d1' WHERE skin_id=$skinId";
          
            if ($conn->query($sql) === TRUE) {
              echo "NICE";
            } else {
              echo "Error updating record: " . $conn->error;
            };
          };

    $conditions = ["FactoryNewSt","MinimalWearSt","FieldTestedSt","WellWormSt","BattleScaredSt"];

// ST 

    for($i=0;$i<5;$i++){

        $filename_1     =       "http://csgobackpack.net/api/GetItemPrice/?id=StatTrak™%20".$skupi.$conditionsURL[$i];
        $data_1         =       file_get_contents($filename_1);
        $array_1        =       json_decode($data_1, true);
      
        $lowest_price_1 =       $array_1["average_price"];
        $d1        =       strtr("$lowest_price_1","$"," ");
          
        echo $skupi.$conditionsURL[$i]."--".$d1;
      
    // če je napaka prejsne cene ne izbrise ampak vzame isto
        if(is_numeric($d1)){
          echo "nice";
        }else {
          $sql = "SELECT $conditions[$i] FROM skins WHERE skin_id=$skinId;";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_fetch_array($result);
      
          $d1 = $resultCheck[0];
          echo "fejk".$d1;
        };
    
    //posodobi  ceno
    
        $sql = "UPDATE skins SET $conditions[$i]='$d1' WHERE skin_id=$skinId";
      
        if ($conn->query($sql) === TRUE) {
          echo "NICE";
        } else {
          echo "Error updating record: " . $conn->error;
        };
      };

    $skinId += 1;

    if($skinId == 539){
      $skinId = 1;
    };

    echo "-----".$j."-----";
    
};
    
    $sql = "UPDATE daily SET skins2='$skinId'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    };

?>