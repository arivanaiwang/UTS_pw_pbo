<?php
session_start();
include 'config.php';

$sql = "SELECT * FROM locations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Lokasi</title>
    <link rel="stylesheet" href="css/locations.css">
</head>
<body>
    
    <?php include 'header.php'; ?>

    <h1>Daftar Lokasi</h1>
    <main>
        <h2>Lokasi yang Tersedia</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Lokasi</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama_lokasi']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td>
                            <a href="edit_location.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete_location.php?id=<?php echo $row['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Tidak ada lokasi yang ditemukan.</td>
                </tr>
            <?php endif; ?>
        </table>
        <a href="add_location.php">Tambah Lokasi Baru</a>
    </main>
</body>
</html>
