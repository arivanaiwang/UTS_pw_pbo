<?php
session_start();
include 'config.php';

$sql = "SELECT * FROM activities";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Aktivitas</title>
    <link rel="stylesheet" href="css/activities.css">
</head>
<body>
    
    <?php include 'header.php' ?>

    <div class="add">
        <h1>Daftar Aktivitas</h1>
        <main>
            <h2>Aktivitas yang Tersedia</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama Aktivitas</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['deskripsi']; ?></td>
                            <td>
                                <a href="edit_activity.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a href="delete_activity.php?id=<?php echo $row['id']; ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Tidak ada aktivitas yang ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </table>
            <a href="add_activity.php">Tambah Aktivitas Baru</a>
        </main>
    </div>
</body>
</html>
