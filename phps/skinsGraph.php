<?php

include 'conn.php';

$datum = '';
$volume = '';
$price = '';
$returnPro = '';
$zamenjava = array("2021-"=>"");

$caseFolder = strtolower($caseFolder);

$query = mysqli_query($conn2, "SELECT datum,volume,price,returnPro FROM $caseFolder ORDER BY datum");

while($row = mysqli_fetch_array($query)){

    $datum1 = strtr($row['datum'],$zamenjava);

    $datum = $datum. '"'.$datum1.'",';
    $volume = $volume. '"'.$row['volume'].'",';
    $price = $price. '"'.$row['price'].'",';
    $returnPro = $returnPro. '"'.$row['returnPro'].'",';


};

//d gre vejica nakonc stran
$datum = trim($datum,",");
$volume = trim($volume,",");
$price = trim($price,",");
$returnPro = trim($returnPro,",");


?>
