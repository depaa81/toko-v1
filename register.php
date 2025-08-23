<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = 'users.json';
    $users = json_decode(file_get_contents($file), true);

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // cek username sudah ada atau belum
    foreach ($users as $user) {
        if ($user['username'] == $username) {
            die("Username sudah dipakai! <a href='register.php'>Coba lagi</a>");
        }
    }

    // simpan user baru
    $users[] = ['username' => $username, 'password' => $password];
    file_put_contents($file, json_encode($users));

    echo "Registrasi berhasil! <a href='login.php'>Login sekarang</a>";
    exit;
}
?>

<form method="POST">
    <h2>Register</h2>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>
                  
