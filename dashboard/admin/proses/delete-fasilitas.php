<?php
include("../../connect.php");
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("Location: login.php");
    exit;
}

// Periksa apakah ID tersedia
if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit;
}

$id_fasilitas = $_GET['id'];

// Hapus data dari database
$sql = "DELETE FROM tb_fasilitas WHERE id_fasilitas = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_fasilitas);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href = '../data-fasilitas.php';</script>";
} else {
    echo "Gagal menghapus data!";
}
?>
