<?php
// CONNECT DATABASE
$host = "localhost";  
$username = "root";   
$password = "";       
$dbname = "db_educational";  

// Membuat koneksi ke database menggunakan MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
