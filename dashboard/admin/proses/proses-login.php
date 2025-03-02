<?php
session_start();
require '../../connect.php'; // Pastikan file koneksi database sudah ada dan benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validasi input tidak boleh kosong
    if (empty($username) || empty($password)) {
        echo "<script>
                alert('Username atau Password tidak boleh kosong!');
                window.location.href = '../login.php';
              </script>";
        exit;
    }

    // Ambil data admin berdasarkan username
    $stmt = $conn->prepare("SELECT id_admin, nama, username, password FROM tb_admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_admin, $nama, $db_username, $db_password);
        $stmt->fetch();

        // Verifikasi password
        if (password_verify($password, $db_password)) {
            // Set session
            $_SESSION['id_admin'] = $id_admin;
            $_SESSION['nama'] = $nama;
            $_SESSION['username'] = $db_username;

            // Cek remember me
            if (isset($_POST['remember'])) {
                setcookie("username", $username, time() + (86400 * 3), "/"); // 3 hari
                setcookie("password", $password, time() + (86400 * 3), "/"); // 3 hari
            }

            echo "<script>
                    alert('Login Berhasil!');
                    window.location.href = '../index.php'; // Redirect ke halaman dashboard
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Password salah!');
                    window.location.href = '../login.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Username tidak ditemukan!');
                window.location.href = '../login.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Akses tidak diizinkan.";
}
?>
