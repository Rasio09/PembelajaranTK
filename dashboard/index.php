<?php

include("connect.php");

$title = "Home - EDUTK GAMES"; // Menetapkan title untuk halaman ini
include('header.php'); // Memasukkan header.php

// fasilitas
$sql = "SELECT * FROM tb_fasilitas";
$result = $conn->query($sql);

// lihat game list
$sql_game_list = "SELECT * FROM tb_gamelist";
$result_game_list = $conn->query($sql_game_list);

?>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php
            include("navbar.php")
        ?>
        <!-- Navbar End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">The Best Educational Games For Child</h1>
                                    <a href="game-list.php" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">List Game For ALL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">EDUTK GAMES make for you Enjoy</h1>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">List Game For ALL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Facilities Start -->
        <!-- PHP -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3" style="font-family: cursive;"> EDUTK Games FASILITAS</h1>
                    <p>Fasilitas EDUTK Games memiliki beberapa fasilitas yang digunakan didalam aplikasi menyediakan game-game didalamnya dengan variasi yang cocok untuk dimainkan oleh anak-anak dengan usia under 7 tahun. game dibuat sederhana dan mudah untuk gunakan. </p>
                </div>
                <div class='row g-4'>
                
                <?php
                    if ($result->num_rows > 0) {
                        // Output data setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo "
                                <div class='col-lg-3 col-sm-6 wow fadeInUp' data-wow-delay='0.1s'>
                                    <div class='facility-item'>
                                        <div class='facility-icon bg-".$row["color_hover"]."'>
                                            <span class='bg-".$row["color_hover"]."'></span>
                                            <i class='fa fa-".$row["icon"]." fa-3x text-".$row["color_hover"]."'></i>
                                            <span class='bg-".$row["color_hover"]."'></span>
                                        </div>
                                        <div class='facility-text bg-".$row["color_hover"]."'>
                                            <h3 class='text-".$row["color_hover"]." mb-3'>".$row["judul_fasilitas"]."</h3>
                                            <p class='mb-0'>".$row["isi_fasilitas"]."</p>
                                        </div>
                                    </div>
                                </div>                
                            ";
                        }
                    }
                ?>
                </div>
            </div>
        </div>
        <!-- Facilities End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4" style="font-family: cursive;">About EDUTK Games</h1>
                        <p style="text-align: justify;">EDUTK Games merupakan website aplikasi didalamnya terdapat game pembelajaran untuk anak-anak berupa game edukasi yang asik dan menyenangkan sederhana, mudah dimainkan selain itu dapat diakses dimanapun serta dapat terhubung dengan internet.</p>
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-6">
                                <a class="btn btn-info rounded-pill py-3 px-5" href="about.php">Read More All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row">
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

        <!-- Masukan Start -->
        <div class="container-xxl py-5" id="masukan">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4" style="font-family: cursive;">Kirim Masukan</h1>
                                <form method="POST" action="proses/simpan_masukan.php">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control border-0" id="email" name="email" placeholder="Email">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="nama_panggil" name="nama_panggil" placeholder="Nama Panggilan">
                                                <label for="nama_panggil">Nama Panggilan</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="usia" name="usia" placeholder="Usia">
                                                <label for="usia">Usia</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control border-0" placeholder="Leave a message here" id="message" name="message" style="height: 150px; resize:none;"></textarea>
                                                <label for="message">Pesan Masukan Request game</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="img/masukan.jpg" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Masukan End -->

<?php 
    // footer
    include("footer.php"); 
?>