<?php

include 'conn.php';

$skupni_volume = 0;

$result = mysqli_query($conn, 
    "SELECT volume FROM cases"
);

while($row = $result->fetch_assoc()) {
    $skupni_volume += $row["volume"];
};

$datum = date("Y/m/d");

$sql = "INSERT INTO volume (datum,volume) VALUES ('$datum','$skupni_volume')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
};

?>
