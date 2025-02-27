<?php
// Menetapkan nilai default untuk title
$title = isset($title) ? $title : "EDUTK GAMES"; // Jika tidak ada $title yang didefinisikan, maka menggunakan "EDUTK GAMES" sebagai default.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Tambahkan CSS untuk styling -->
    <style>
        .footer-link {
            color: #fff; /* Warna teks putih */
            text-decoration: none; /* Menghilangkan garis bawah */
            font-size: 16px; /* Ukuran font yang sedikit lebih besar */
            padding: 5px 10px; /* Memberikan padding agar lebih enak dilihat */
            display: inline-block; /* Menjadikan link dalam satu baris */
            transition: color 0.3s ease, transform 0.3s ease; /* Efek transisi yang halus */
        }

        .footer-link:hover {
            color: #ffd700; /* Warna kuning keemasan saat hover */
            transform: scale(1.1); /* Efek sedikit membesar saat hover */
        }

        .footer-link:active {
            color: #ffa500; /* Warna oranye ketika link ditekan */
        }
    </style>
</head>

<body>
