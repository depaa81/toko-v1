<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
<p>Ini adalah halaman utama setelah login.</p>
<a href="logout.php">Logout</a>

