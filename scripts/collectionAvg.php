<?php

include 'conn.php';

for($i = 1;$i<17;$i++){

    $len = 0;
    $povprecje = 0;

    $itemPovprecje = mysqli_query($conn,"SELECT povprecje FROM specialitems WHERE id=$i");

    while($row = $itemPovprecje->fetch_assoc()) {
        ++$len;
        $povprecje += $row["povprecje"];
    };

    $povprecje = $povprecje / $len;

    echo $povprecje;

    $sql = "UPDATE collections SET povprecje='$povprecje' WHERE collection_id='$i'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully". "<br>";
    } else {
      echo "Error updating record: " . $conn->error;
    };
}

?>