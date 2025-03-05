<?php
include ("../../connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $icon = $_POST['icon'];
    $color = $_POST['color'];

    // Update data ke database
    $query = $conn->prepare("UPDATE tb_fasilitas SET judul_fasilitas=?, isi_fasilitas=?, icon=?, color_hover=? WHERE id_fasilitas=?");
    $query->bind_param("sssssi", $judul, $isi, $icon, $color, $id);

    if ($query->execute()) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../data-fasilitas.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>
