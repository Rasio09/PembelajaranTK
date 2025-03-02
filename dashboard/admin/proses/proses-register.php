<?php
require '../../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi form
    if (empty($nama) || empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        echo "<script>
                alert('Inputan Kosong, Silahkan Isi !');
                window.location.href = '../register.php';
              </script>";
    } elseif ($password !== $confirm_password) {
        echo "<script>
                alert('Konfirmasi Password Tidak Cocok !');
                window.location.href = '../register.php';
              </script>";
    } else {
        // Hash password untuk keamanan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);    

        // Cek apakah email sudah terdaftar
        $sql_check = "SELECT * FROM tb_admin WHERE email = '$email'";
        $result = $conn->query($sql_check);

        if ($result->num_rows > 0) {
            echo "<script>
                alert('Email Sudah Terdaftar!');
                window.location.href = '../register.php';
              </script>";
        } else {
            // Masukkan data ke database
            $sql = "INSERT INTO tb_admin VALUES ('', '$nama', '$username', '$hashed_password', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        alert('Berhasil Registrasi!');
                        window.location.href = '../login.php';
                    </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>
