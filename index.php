<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marine Explorer</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    
    <?php include 'header.php'; ?>

    <div class="add">
        <main>
            <section class="welcome">
                <h2>Selamat Datang di Marine Explorer</h2>
                <p>Jelajahi dan temukan lokasi-lokasi menarik di laut Indonesia. Tambahkan lokasi favorit Anda dan bagikan dengan komunitas!</p>
            </section>

            <section class="map-container">
                <div id="map" style="height: 600px;"></div>
            </section>

            <script>
                var map = L.map('map').setView([-6.200001, 106.845596], 7);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map);

                var snorkelingSpot = L.marker([-6.738719671743339, 105.2567321356905]).addTo(map);
                snorkelingSpot.bindPopup('<b>Spot Snorkeling Pulau Peutjang</b><br>Terumbu karang yang indah. Jenis spesies: ikan badut, terumbu karang. <br><img src="img/pulau Peutjang.jpg" alt="Spot Snorkeling A" width="50%">');

                var divingSpot = L.marker([-5.945989180339795, 105.86255363802267]).addTo(map);
                divingSpot.bindPopup('<b>Spot Menyelam Pulau Sangiang</b><br>Penyelaman untuk pemula. Banyak ikan dan keindahan bawah laut. <br><img src="img/pulau sangiang.jpg" alt="Spot Menyelam B" width="50%" heigth="50%">');

                var beachSpot = L.marker([-6.478713549194854, 105.65558802683873]).addTo(map);
                beachSpot.bindPopup('<b>Pantai Tanjung Lesung</b><br>Pantai yang bersih dan sepi. Cocok untuk bersantai. <br><img src="img/Pantai tj lesung.jpg" Pantai C" width="50%">');

            </script>
        </main>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
