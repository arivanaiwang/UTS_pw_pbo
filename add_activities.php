<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    // Masukkan data ke dalam database
    $sql = "INSERT INTO activities (name, description) VALUES ('$name', '$description')";
    if ($conn->query($sql) === TRUE) {
        header("Location: activities.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Aktivitas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Tambah Aktivitas</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="POST">
            <label for="name">Nama Aktivitas:</label>
            <input type="text" id="name" name="name" required>
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" required></textarea>
            <button type="submit">Tambah Aktivitas</button>
        </form>
    </main>
</body>
</html>
