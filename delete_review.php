<?php
session_start();
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM reviews WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: reviews.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
