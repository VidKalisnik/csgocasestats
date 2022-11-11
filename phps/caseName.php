<?php

    include 'conn.php';

    $caseName = $_POST['caseName'];
    $zamenjava = array(" Case"=>"",":"=>""," "=>"");
    $caseFolder = strtr($_POST['caseName'], $zamenjava);

    $result = mysqli_fetch_array(mysqli_query($conn, "SELECT returnRate,volume,price FROM cases WHERE case_name='$caseName'")); 
      
?>