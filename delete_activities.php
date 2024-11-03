<?php
session_start();
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM activities WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: activities.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
