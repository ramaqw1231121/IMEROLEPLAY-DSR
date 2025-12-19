<?php
$connect = new mysqli("localhost","root","");
$connect->select_db("imeroleplaydsr");

if ($connect->connect_error){
    die("koneksi gagal:");
}
?>