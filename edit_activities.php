<?php
session_start();
include 'config.php';

$id = $_GET['id'];

// Ambil data aktivitas berdasarkan ID
$sql = "SELECT * FROM activities WHERE id = $id";
$result = $conn->query($sql);
$activity = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    // Update data ke dalam database
    $sql = "UPDATE activities SET name='$name', description='$description' WHERE id=$id";
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
    <title>Edit Aktivitas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Aktivitas</h1>
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
            <input type="text" id="name" name="name" value="<?php echo $activity['name']; ?>" required>
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" required><?php echo $activity['description']; ?></textarea>
            <button type="submit">Update Aktivitas</button>
        </form>
    </main>
</body>
</html>
