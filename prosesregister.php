<?php
session_start();
require_once 'db.php';


$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = '1'; // default untuk pendaftaran ini

    // Cek apakah username sudah ada
    $cek = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_num_rows($cek) > 0) {
        $message = 'Username sudah digunakan.';
    } else {
        $sql = "INSERT INTO user (username, password, role) 
                VALUES ('$username', '$password', '$role')";
        if (mysqli_query($connect, $sql)) {
            $message = 'Admin berhasil ditambahkan.';
        } else {
            $message = 'Gagal menambahkan admin.';
        }
    }
    header("Location: login.php");
    exit;
}
?>