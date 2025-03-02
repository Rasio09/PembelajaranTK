<?php
session_start();
session_destroy(); // Hapus session

// Hapus cookie
setcookie("username", "", time() - 3600, "/");
setcookie("password", "", time() - 3600, "/");

header("Location: ../login.php");
exit;
?>