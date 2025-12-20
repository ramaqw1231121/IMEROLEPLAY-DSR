<?php
require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    header("Location: login.php?error=Username dan password wajib diisi");
    exit;
}

// Prepared Statement (AMAN)
$query = "SELECT id, username, password, role FROM user WHERE username = '$username' LIMIT 1";
// $stmt->bind_param("s", $username);
// $stmt->execute();
// $result = $stmt->get_result();
$result = mysqli_query($connect,$query);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    if (password_verify($password, $user['password'])) {

        // Regenerasi session (ANTI session hijacking)
        session_regenerate_id(true);

        $_SESSION['id']       = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role']     = $user['role'];

        header("Location: admin/dashboard.php");
        exit;
    } else {
        header("Location: login.php?error=Password salah");
        exit;
    }
} else {
    header("Location: login.php?error=Username tidak ditemukan");
    exit;
}

$stmt->close();
?>