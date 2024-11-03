<?php
session_start();
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM locations WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: locations.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
