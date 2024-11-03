<?php
session_start();
include 'config.php';

$sql = "SELECT reviews.*, users.username, locations.nama_lokasi FROM reviews 
        JOIN users ON reviews.user_id = users.id 
        JOIN locations ON reviews.location_id = locations.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Review</title>
    <link rel="stylesheet" href="css/reviews.css">
</head>
<body>
    
    <?php include 'header.php'; ?>
    <div class="reviews">
        <main>
            <h2>Review yang Tersedia</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Lokasi</th>
                    <th>Rating</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['nama_lokasi']; ?></td>
                            <td><?php echo $row['rating']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <a href="edit_review.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a href="delete_review.php?id=<?php echo $row['id']; ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">.</td>
                    </tr>
                <?php endif; ?>
            </table>
            <a href="add_review.php">Tambah Review Baru</a>
        </main>
    </div>
</body>
</html>
