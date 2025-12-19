<?php include '../db.php'; ?>
<?php if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    // Ambil semua gambar buku itu
    $result = $connect->query("SELECT gambar FROM produk WHERE id = $id");
    while ($row = $result->fetch_assoc()) {
        if (!empty($row['images']) && file_exists("../images/" . $row['images'])) {
            unlink("../images/" . $row['images']); // hapus file
        }
    }

    // Hapus data buku (gambar ikut terhapus otomatis jika FK ON DELETE CASCADE)
    $connect->query("DELETE FROM produk WHERE id = $id");

    echo "<script>alert('senjata berhasil dihapus'); window.location='dashboard.php';</script>";
}
?>

<!-- CRUD (Create, Read, Update, Delete) -->