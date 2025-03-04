<?php
include ("../../connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nomor_wa = $_POST['nomor_wa'];
    $password = $_POST['password'];

    // Ambil password lama
    $query = $conn->prepare("SELECT password FROM tb_admin WHERE id_admin = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    $admin = $result->fetch_assoc();
    $password_lama = $admin['password'];

    // Jika password baru diisi, hash ulang; jika tidak, gunakan password lama
    if (!empty($password)) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
    } else {
        $password_hash = $password_lama;
    }

    // Update data ke database
    $query = $conn->prepare("UPDATE tb_admin SET nama=?, username=?, email=?, nomor_wa=?, password=? WHERE id_admin=?");
    $query->bind_param("sssssi", $nama, $username, $email, $nomor_wa, $password_hash, $id);

    if ($query->execute()) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../data-admin.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>
