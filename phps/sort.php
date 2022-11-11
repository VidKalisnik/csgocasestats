<?php

include 'conn.php';

$zamenjava = array(" Case"=>"",":"=>""," "=>"");

// best return rate
$caseName_rR = mysqli_fetch_array(mysqli_query($conn, "SELECT case_name FROM cases ORDER BY returnRate DESC LIMIT 1;"))[0];
$caseFolder_rR = strtr($caseName_rR, $zamenjava);

// most expensive
$caseName_price_e = mysqli_fetch_array(mysqli_query($conn, "SELECT case_name FROM cases ORDER BY price DESC LIMIT 1;"))[0];
$caseFolder_price_e = strtr($caseName_price_e, $zamenjava);

// cheapest
$caseName_price_c = mysqli_fetch_array(mysqli_query($conn, "SELECT case_name FROM cases ORDER BY price ASC LIMIT 1;"))[0];
$caseFolder_price_c = strtr($caseName_price_c, $zamenjava);

//random
$caseId = rand(1,34);
$caseName_random = mysqli_fetch_array(mysqli_query($conn, "SELECT case_name FROM cases WHERE case_id=$caseId"))[0];
$caseFolder_random = strtr($caseName_random, $zamenjava);

?>