<?php
require '../../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul_game'];
    $ket = $_POST['ket_game'];

    // **Proses Upload Gambar**
    $target_dir = "../../upload_img/"; // Folder penyimpanan gambar
    $gambar = $_FILES['gambar_game'];
    $gambar_name = basename($gambar['name']);
    $gambar_size = $gambar['size'];
    $gambar_tmp = $gambar['tmp_name'];
    $gambar_ext = strtolower(pathinfo($gambar_name, PATHINFO_EXTENSION));

    // Validasi format file gambar
    $allowed_ext = ["jpg", "jpeg", "png"];
    if (!in_array($gambar_ext, $allowed_ext)) {
        echo "<script>
                alert('Format foto harus JPG atau PNG!');
                window.location.href = '../data-gamelist.php';
              </script>";
        exit;
    }

    // Validasi ukuran file gambar (maksimum 2MB)
    if ($gambar_size > 2 * 1024 * 1024) {
        echo "<script>
                alert('Ukuran foto maksimal 2 MB!');
                window.location.href = '../data-gamelist.php';
              </script>";
        exit;
    }

    // Nama unik untuk foto
    $gambar_new_name = "gamelist_" . time() . "." . $gambar_ext;
    $target_file = $target_dir . $gambar_new_name;

    // **Proses Upload File Game (ZIP)**
    $game_file = $_FILES['game_file'];
    $game_name = basename($game_file['name']);
    $game_tmp = $game_file['tmp_name'];

    $game_namefix = pathinfo($game_name, PATHINFO_FILENAME); // Mengambil nama tanpa ekstensi

    // Tentukan folder untuk menyimpan file game
    $game_dir = "../../folder_game/";  // Nama folder berdasarkan nama file ZIP

    // Buat folder baru untuk file game jika belum ada
    if (!file_exists($game_dir)) {
        if (!mkdir($game_dir, 0777, true)) {
            echo "<script>
                    alert('Gagal membuat folder untuk file game!');
                    window.location.href = '../data-gamelist.php';
                  </script>";
            exit;
        }
    }

    // Simpan file ZIP ke folder yang telah dibuat
    if (move_uploaded_file($game_tmp, $game_dir . '/' . $game_name)) {
        // Ekstrak file ZIP
        $zip = new ZipArchive;
        if ($zip->open($game_dir . '/' . $game_name) === TRUE) {
            $zip->extractTo($game_dir);  // Ekstrak ke folder tujuan
            $zip->close();
            unlink($game_dir . '/' . $game_name);  // Hapus file ZIP setelah diekstrak
        } else {
            echo "<script>
                    alert('Gagal mengekstrak file ZIP!');
                    window.location.href = '../data-gamelist.php';
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                alert('Gagal mengupload file game!');
                window.location.href = '../data-gamelist.php';
              </script>";
        exit;
    }

    // Simpan foto ke folder upload_img
    if (move_uploaded_file($gambar_tmp, $target_file)) {
        // Simpan informasi ke database
        $sql_insert = "INSERT INTO tb_gamelist (id_game, judul_game, ket_game, gambar, direktori_file) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("sssss", $id, $judul, $ket, $gambar_new_name, $game_namefix);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    window.location.href = '../data-gamelist.php';
                  </script>";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
        $stmt->close();
    } else {
        echo "<script>
                alert('Gagal mengupload foto!');
                window.location.href = '../data-gamelist.php';
              </script>";
    }

    $conn->close();
}
?>
