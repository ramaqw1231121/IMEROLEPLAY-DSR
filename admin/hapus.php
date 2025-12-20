<?php
include '../db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

$id = (int)$id; // pastikan integer

// Ambil nama gambar
$stmt = $connect->prepare("SELECT gambar FROM produk WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $gambar = $row['gambar'];

    if (!empty($gambar)) {
        $path = "../images/" . $gambar;

        if (file_exists($path)) {
            unlink($path); // hapus file gambar
        }
    }
}
$stmt->close();

// Hapus produk dari database
$stmt = $connect->prepare("DELETE FROM produk WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: dashboard.php");
exit;
?>