<?php
require '../../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi input tidak boleh kosong
    if (empty($nama) || empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        echo "<script>
                alert('Inputan tidak boleh kosong!');
                window.location.href = '../register.php';
              </script>";
        exit;
    }

    // Validasi password
    if ($password !== $confirm_password) {
        echo "<script>
                alert('Konfirmasi password tidak cocok!');
                window.location.href = '../register.php';
              </script>";
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Validasi email sudah terdaftar
    $sql_check = "SELECT * FROM tb_admin WHERE email = ?";
    $stmt = $conn->prepare($sql_check);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
                alert('Email sudah terdaftar!');
                window.location.href = '../register.php';
              </script>";
        exit;
    }
    $stmt->close();

    // **Proses Upload Foto**
    $target_dir = "../img_admin/"; // Folder penyimpanan
    $foto = $_FILES['foto'];
    $foto_name = basename($foto['name']);
    $foto_size = $foto['size'];
    $foto_tmp = $foto['tmp_name'];
    $foto_ext = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));

    // Validasi format file
    $allowed_ext = ["jpg", "jpeg", "png"];
    if (!in_array($foto_ext, $allowed_ext)) {
        echo "<script>
                alert('Format foto harus JPG atau PNG!');
                window.location.href = '../register.php';
              </script>";
        exit;
    }

    // Validasi ukuran file (maksimum 2MB)
    if ($foto_size > 2 * 1024 * 1024) {
        echo "<script>
                alert('Ukuran foto maksimal 2MB!');
                window.location.href = '../register.php';
              </script>";
        exit;
    }

    // Nama unik untuk foto
    $foto_new_name = "admin_" . time() . "." . $foto_ext;
    $target_file = $target_dir . $foto_new_name;

    // Simpan file ke folder
    if (move_uploaded_file($foto_tmp, $target_file)) {
        // Simpan ke database
        $sql_insert = "INSERT INTO tb_admin (nama, username, password, email, direktori_foto) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("sssss", $nama, $username, $hashed_password, $email, $foto_new_name);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Registrasi berhasil!');
                    window.location.href = '../login.php';
                  </script>";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
        $stmt->close();
    } else {
        echo "<script>
                alert('Gagal mengupload foto!');
                window.location.href = '../register.php';
              </script>";
    }

    $conn->close();
}
?>
