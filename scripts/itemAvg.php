<?php

include 'conn.php';

// Arrayi za stolpce v tabeli katere bomo vzeli podatke

$conditions = ["FactoryNew","MinimalWear","FieldTested","WellWorm","BattleScared"];
$conditionsSt = ["FactoryNewSt","MinimalWearSt","FieldTestedSt","WellWormSt","BattleScaredSt"];

$navadniAvg = 0;
$stAvg = 0;

// for loop je zanka, ki gre skozi vse skin-e

for($i=1;$i<539;$i++){

    // zanka foreach gre skozi vse stolpce in iz njih vzame podatke

    foreach($conditions as $condition){

      $sql = "SELECT $condition FROM skins WHERE skin_id='$i';";
      $result = mysqli_query($conn, $sql);
      $cena = mysqli_fetch_array($result);

      $condition = $condition."O";

      $sql = "SELECT  o.$condition FROM skins s JOIN odds o ON s.odds = o.odds_id WHERE skin_id='$i'";
      $result = mysqli_query($conn, $sql);
      $verjetnost = mysqli_fetch_array($result);

      $navadni = $cena[0]*$verjetnost[0];

      $navadniAvg += $navadni;
    };

    foreach($conditionsSt as $condition){

      $sql = "SELECT $condition FROM skins WHERE skin_id='$i';";
      $result = mysqli_query($conn, $sql);
      $cena = mysqli_fetch_array($result);

      $zamenjava = array("St" => "O");
      $condition = strtr($condition,$zamenjava);

      $sql = "SELECT  o.$condition FROM skins s JOIN odds o ON s.odds = o.odds_id WHERE skin_id='$i'";
      $result = mysqli_query($conn, $sql);
      $verjetnost = mysqli_fetch_array($result);

      $st = $cena[0]*$verjetnost[0];

      $stAvg += $st;
    };

    $skinAvg = $navadniAvg*0.9 + $stAvg*0.1;

    echo $skinAvg;
    echo "<br>";

    $sql = "UPDATE skins SET povprecje='$skinAvg' WHERE skin_id='$i'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully". "<br>";
    } else {
      echo "Error updating record: " . $conn->error;
    };

    $navadniAvg = 0;
    $stAvg = 0;
};



// ZA NOZE
for($i=1;$i<410;$i++){

  // zanka foreach gre skozi vse stolpce in iz njih vzame podatke

  foreach($conditions as $condition){

    $sql = "SELECT $condition FROM specialitems WHERE id='$i';";
    $result = mysqli_query($conn, $sql);
    $cena = mysqli_fetch_array($result);

    $condition = $condition."O";

    $sql = "SELECT  o.$condition FROM specialitems s JOIN odds o ON s.odds = o.odds_id WHERE id='$i'";
    $result = mysqli_query($conn, $sql);
    $verjetnost = mysqli_fetch_array($result);

    $navadni = $cena[0]*$verjetnost[0];

    $navadniAvg += $navadni;
  };

  foreach($conditionsSt as $condition){

    $sql = "SELECT $condition FROM specialitems WHERE id='$i';";
    $result = mysqli_query($conn, $sql);
    $cena = mysqli_fetch_array($result);

    $zamenjava = array("St" => "O");
    $condition = strtr($condition,$zamenjava);

    $sql = "SELECT  o.$condition FROM specialitems s JOIN odds o ON s.odds = o.odds_id WHERE id='$i'";
    $result = mysqli_query($conn, $sql);
    $verjetnost = mysqli_fetch_array($result);

    $st = $cena[0]*$verjetnost[0];

    $stAvg += $st;
  };

  $skinAvg = $navadniAvg*0.9 + $stAvg*0.1;

  echo $skinAvg;
  echo "<br>";

  $sql = "UPDATE specialitems SET povprecje='$skinAvg' WHERE id='$i'";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully". "<br>";
  } else {
    echo "Error updating record: " . $conn->error;
  };

  $navadniAvg = 0;
  $stAvg = 0;
};

?>