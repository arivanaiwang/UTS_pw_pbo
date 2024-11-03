<?php
session_start();
include 'config.php';

$id = $_GET['id'];

// Ambil data spesies berdasarkan ID
$sql = "SELECT * FROM species WHERE id = $id";
$result = $conn->query($sql);
$species = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    // Update data ke dalam database
    $sql = "UPDATE species SET name='$name', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: species.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Spesies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Spesies</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="POST">
            <label for="name">Nama Spesies:</label>
            <input type="text" id="name" name="name" value="<?php echo $species['name']; ?>" required>
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" required><?php echo $species['description']; ?></textarea>
            <button type="submit">Update Spesies</button>
        </form>
    </main>
</body>
</html>
