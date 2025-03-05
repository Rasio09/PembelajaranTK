<?php
include ("../../connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul_fasilitas'];
    $isi = $_POST['isi_fasilitas'];
    $icon = $_POST['icon_fasilitas'];
    $color = $_POST['color_hover'];

    // Update data ke database
    $query = $conn->prepare("UPDATE tb_fasilitas SET judul_fasilitas='$judul', isi_fasilitas='$isi', icon='$icon', color_hover='$color' WHERE id_fasilitas=$id");


    if ($query->execute()) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../data-fasilitas.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>
