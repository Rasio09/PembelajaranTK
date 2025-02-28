<?php
    include("header.php");
    $title = "Masukan - EDUTK GAMES";
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
                <h1 class="display-2 text-white animated slideInDown mb-2">Masukan EDUTK Games</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb" style="font-weight:bold; font-size: 20px">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Masukan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
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


        <!-- Footer Start -->
        <?php
            include("footer.php");
        ?>
        <!-- Footer End -->
        