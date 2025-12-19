<?php include '../db.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $products = $_POST['namaproduk'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    // Upload gambar
    $gambar = $_FILES['images']['name'];
    $tmp = $_FILES['images']['tmp_name'];
    move_uploaded_file($tmp, "../images/".$gambar);
    $sql = "INSERT INTO produk (namaproduk, harga, kategori, gambar) VALUES ('$products', '$harga', '$kategori', '$gambar')";
    if ($connect->query($sql)) {
        echo "<script>alert('produk berhasil ditambahkan!'); window.location='dashboard.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>