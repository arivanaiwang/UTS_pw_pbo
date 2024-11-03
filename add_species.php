<?php
session_start();
include 'config.php';

$locations = $conn->query("SELECT * FROM locations");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $location_id = $_POST['location_id'];
    $nama = $_POST['nama']; // Ganti 'name' dengan 'nama'
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    // Cek apakah direktori 'uploads' ada, jika tidak buat direktori
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Cek apakah file gambar berhasil diunggah
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Masukkan data ke dalam database
        $sql = "INSERT INTO species (location_id, nama, deskripsi, gambar) VALUES ('$location_id', '$nama', '$description', '$image')";
        if ($conn->query($sql) === TRUE) {
            header("Location: species.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Spesies</title>
    <link rel="stylesheet" href="css/add_species.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="add">
        <h1>Tambah Spesies</h1>
        <main>
            <form method="POST" enctype="multipart/form-data">
                <label for="location_id">Lokasi:</label>
                <select id="location_id" name="location_id" required>
                    <option value="">Pilih Lokasi</option>
                    <?php while($row = $locations->fetch_assoc()): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_lokasi']; ?></option>
                    <?php endwhile; ?>
                </select>

                <label for="nama">Nama Spesies:</label>
                <input type="text" id="nama" name="nama" required> <!-- Ganti 'name' dengan 'nama' -->

                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" required></textarea>

                <label for="image">Unggah Gambar:</label>
                <input type="file" id="image" name="image" required>

                <button type="submit">Tambah Spesies</button>
            </form>
        </main>
    </div>
</body>
</html>
