<?php
session_start();
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM species WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: species.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
