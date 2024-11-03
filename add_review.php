<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id']; 
    $location_id = $_POST['location_id'];
    $rating = $_POST['rating'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO reviews (user_id, location_id, rating, description) VALUES ('$user_id', '$location_id', '$rating', '$description')";
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
    <title>Tambah Review</title>
    <link rel="stylesheet" href="css/add_review.css">
</head>
<body>
    
    <?php include 'header.php' ?>

    <div class="add">
        <h1>Tambah Review</h1>
        <main>
            <form method="POST">
                <label for="location_id">Pilih Lokasi:</label>
                <select id="location_id" name="location_id" required>
                    <?php
                    $location_result = $conn->query("SELECT * FROM locations");
                    while($location = $location_result->fetch_assoc()):
                    ?>
                        <option value="<?php echo $location['id']; ?>"><?php echo $location['nama_lokasi']; ?></option>
                    <?php endwhile; ?>
                </select>

                <label for="rating">Rating:</label>
                <input type="number" id="rating" name="rating" min="1" max="5" required>
                    
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" required></textarea>
                    
                <button type="submit">Tambah Review</button>
            </form>
        </main>
    </div>
</body>
</html>
