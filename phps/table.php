<?php

include 'conn.php';

$zamenjava = array(" Case"=>"",":"=>""," "=>"");
$i = 1;

    $result = mysqli_query($conn, 
    "SELECT case_name,price,returnRate,volume 
    FROM cases 
    ORDER BY returnRate DESC;");

    while($row = mysqli_fetch_assoc($result)) {

        $caseFolder = strtr($row['case_name'], $zamenjava);

            echo '
        <tr class="clickable-row" id='.$i.'>
            <td><img src="images/'.$caseFolder.'/256fx256f.png" alt="" style="height: 75px;"></td>
            <td style="text-align:left;" class="caseName">'.$row['case_name'].'</td>
            <td style="text-align:center;">'.$row['returnRate'].'%</td>
            <td style="text-align:center;">'.$row['volume'].'</td>
            <td style="text-align:center;">$'.$row['price'].'</td>
        </tr>';

        ++$i;
    };




?>