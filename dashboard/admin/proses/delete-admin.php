<?php
include("../../connect.php");
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("Location: login.php");
    exit;
}

// Periksa apakah ID tersedia
if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

$id_admin = $_GET['id'];

// Hapus data dari database
$sql = "DELETE FROM tb_admin WHERE id_admin = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_admin);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href = '../data-admin.php';</script>";
} else {
    echo "Gagal menghapus data!";
}
?>
