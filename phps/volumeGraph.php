<?php

include 'conn.php';

$datum = '';
$volume = '';
$zamenjava = array("2021-"=>"");

$result = mysqli_query($conn, "SELECT datum,volume FROM volume ORDER BY datum");

while($row = mysqli_fetch_array($result)){

    $datum1 = strtr($row['datum'],$zamenjava);

    $datum = $datum. '"'.$datum1.'",';
    $volume = $volume. '"'.$row['volume'].'",';

};

//d gre vejica nakonc stran
$datum = trim($datum,",");
$volume = trim($volume,",");


?>
