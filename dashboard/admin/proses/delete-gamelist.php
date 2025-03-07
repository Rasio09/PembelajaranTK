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

$id_gamelist = $_GET['id'];

// Hapus data dari database
$sql = "DELETE FROM tb_gamelist WHERE id_game = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_gamelist);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href = '../data-gamelist.php';</script>";
} else {
    echo "Gagal menghapus data!";
}
?>
