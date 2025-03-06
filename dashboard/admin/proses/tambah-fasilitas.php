<?php
include ("../../connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul_fasilitas'];
    $isi = $_POST['isi_fasilitas'];
    $icon = $_POST['icon_fasilitas'];
    $color = $_POST['color_hover'];

    // Tambah data ke database
    $query = $conn->prepare("INSERT INTO tb_fasilitas VALUES ('$id', '$judul', '$isi', '$icon', '$color')");

    if ($query->execute()) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='../data-fasilitas.php';</script>";
    } else {
        echo "<script>alert('Gagal tambah data!');</script>";
    }
}
?>
