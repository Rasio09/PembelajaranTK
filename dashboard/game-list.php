<?php
    include("connect.php");
    include("header.php");

    $sql = "SELECT * FROM tb_gamelist";
    $result = $conn->query($sql);
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
            include("navbar.php");
        ?>
        <!-- Navbar End -->


        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-2">Game List</h1>
                <nav aria-label="breadcrumb animated slideInDown" style="font-weight:bold; font-size: 20px">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Game List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4" style="font-family: cursive;">GAME LIST EDUTK</h1>
                        
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75 rounded-circle bg-light p-3" src="img/about-1.jpg" alt="">
                            </div>
                            <div class="col-6 text-start" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-2.jpg" alt="">
                            </div>
                            <div class="col-6 text-end" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- list dari database -->
        <?php
        if ($result->num_rows > 0) {
        // Output data setiap baris
            while($row= $result->fetch_assoc()) {
            echo " 
                <div class='container-xxl py-5>
                    <div class='container'>
                        <div class='bg-light rounded'>
                            <div class='row g-0'>
                                <div class='col-lg-6 wow fadeIn' data-wow-delay='0.1s' style='min-height: 400px;'>
                                    <div class='position-relative h-100'>
                                        <img class='position-absolute w-100 h-100 rounded' src='upload_img/".$row["gambar"]."' style='object-fit: cover;'>
                                    </div>
                                </div>
                                <div class='col-lg-6 wow fadeIn' data-wow-delay='0.5s'>
                                    <div class='h-100 d-flex flex-column justify-content-center p-5'>
                                        <h1 class='mb-4'>".$row["judul_game"]."</h1>
                                        <p class='mb-4'>
                                        ".$row["ket_game"]."
                                        </p>
                                        <a class='btn btn-primary py-3 px-5' href='folder_game/".$row["direktori_file"]."'>Mainkan Sekarang<i class='fa fa-arrow-right ms-2'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
        ?>
        <!-- List End -->

        <!-- Footer Start -->
        <?php
            include("footer.php");
        ?>
        <!-- footer End -->