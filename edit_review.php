<?php
session_start();
include 'config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM reviews WHERE id = $id";
$result = $conn->query($sql);
$review = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = $_POST['rating'];
    $komentar = $_POST['komentar'];
    
    $sql = "UPDATE reviews SET rating='$rating', komentar='$komentar' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: reviews.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Review</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Review</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="POST">
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" value="<?php echo $review['rating']; ?>" min="1" max="5" required>
            <label for="komentar">Komentar:</label>
            <textarea id="komentar" name="komentar" required><?php echo $review['komentar']; ?></textarea>
            <button type="submit">Update Review</button>
        </form>
    </main>
</body>
</html>
