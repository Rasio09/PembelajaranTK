<?php
include("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // dapatkan inputan
    $nama_lengkap = $_POST["nama_lengkap"];
    $email = $_POST["email"];
    $nama_panggil = $_POST["nama_panggil"];
    $usia = $_POST["usia"];
    $masukan = $_POST["message"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO tb_masukan VALUES ('', '$nama_lengkap', '$nama_panggil', '$email', '$usia', '$masukan')";

    // Check if the query is successful
    if ($conn->query($sql) === TRUE) {
        // Show a success alert and redirect to the index page
        echo "<script>
                alert('Masukan berhasil dikirim!');
                window.location.href = '../index.php'; // Redirect to index.php
              </script>";
    } else {
        // If the query failed, show an error alert
        echo "<script>
                alert('Terjadi kesalahan, coba lagi!');
                window.location.href = '../index.php'; // Redirect to index.php
              </script>";
    }

    // Close the database connection
    $conn->close();
}
?>
