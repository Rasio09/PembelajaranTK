<?php

$title = "About - EDUTK GAMES"; // Menetapkan title untuk halaman ini
include('header.php'); // Memasukkan header.php

?>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <?php
            include("navbar.php")
        ?>
        <!-- Navbar End -->

        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-2">About EDUTK Games</h1>
                <nav aria-label="breadcrumb animated slideInDown" style="font-weight:bold; font-size: 20px">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4" style="font-family: cursive;">About EDUTK Games</h1>
                        <p style="text-align: justify;">EDUTK Games merupakan website aplikasi didalamnya terdapat game pembelajaran untuk anak-anak berupa game edukasi yang asik dan menyenangkan sederhana, mudah dimainkan selain itu dapat diakses dimanapun serta dapat terhubung dengan internet.</p>
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row mt-4">
                        <!-- Gambar Kiri -->
                        <div class="col-6 text-start" style="margin-top: -150px;">
                            <img class="img-fluid w-100 bg-light p-3" src="img/berhitung.png" alt="">
                        </div>

                        <!-- Gambar Kanan -->
                        <div class="col-6 text-end" style="margin-top: -150px;">
                            <img class="img-fluid w-100 bg-light p-3" src="img/game menangkap.png" alt="">
                        </div>
                    </div>
                    
                    <!-- Gambar Tengah -->
                    <div class="row justify-content-center" style="margin-top: -50px;">
                        <div class="col-6">
                            <img class="img-fluid w-100 bg-light p-3" src="img/hubungkan gambar.png" alt="">
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Call To Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-120 mt-5 rounded" src="img/hubungkan gambar.png" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4" style="font-family: cursive;">Example Game</h1>
                                <h3 class="mb-4" style="font-family: cursive;">Game Menghubungkan Gambar</h3>
                                <p class="mb-4" style="text-align: justify">Game menghubungkan gambar sesuai dengan gambar yang sama. untuk menghubungkan pilih gambar dari kiri ke kanan sesuai dengan pilihan gambar yang sama jika sudah akan keluar garis penghubung dan jika benar yang dihubungkan akan bunyi suara hewan itu sesuai yang sudah dihubungkan.
                                </p>
                                <a class="btn btn-primary py-3 px-5" href="game-list.php">Get Started List Game All<i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call To Action End -->

<?php 
    // footer
    include("footer.php"); 
?>