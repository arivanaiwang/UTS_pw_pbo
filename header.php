<link rel="stylesheet" href="css/arivanaiwang.css">
<header>
    <div class="container">
        <h1>Marine Explorer</h1>
        <img src="img/20240914_054457.png" alt="Logo" class="logo" width="60px" height="60px">
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="species.php">Species</a></li> 
                <li><a href="activities.php">Aktivitas</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="locations.php">Daftar Lokasi</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Registrasi</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
