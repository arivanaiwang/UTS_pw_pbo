<?php
session_start();
include 'config.php';

$id = $_GET['id'];
$user_id = $_SESSION['user_id']; 

$sql = "SELECT * FROM locations WHERE id = $id";
$result = $conn->query($sql);
$location = $result->fetch_assoc();

if ($location['user_id'] != $user_id && $_SESSION['role'] != 'admin') {
    die("Anda tidak memiliki izin untuk mengedit lokasi ini.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    $sql = "UPDATE locations SET name='$name', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: locations.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Lokasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Lokasi</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="POST">
            <label for="name">Nama Lokasi:</label>
            <input type="text" id="name" name="name" value="<?php echo $location['name']; ?>" required>
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" required><?php echo $location['description']; ?></textarea>
            <button type="submit">Update Lokasi</button>
        </form>
    </main>
</body>
</html>
