<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = 'users.json';
    $users = json_decode(file_get_contents($file), true);

    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['username'] == $username && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        }
    }

    echo "Username atau password salah! <a href='login.php'>Coba lagi</a>";
}
?>

<form method="POST">
    <h2>Login</h2>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
    <p>Belum punya akun? <a href="register.php">Register</a></p>
</form>

