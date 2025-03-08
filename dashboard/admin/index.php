<?php

include("../connect.php");
session_start();
if (!isset($_SESSION['id_admin'])) {
    header("Location: login.php");
    exit;
}

// title web header
$title = "Dashboard - ADMIN";
include("header.php");

// Jumlah Game Total
$sql_jum_game = "SELECT COUNT(id_game) AS jumlah_game FROM tb_gamelist;";
$result_jum_game = $conn->query($sql_jum_game);

// Total Admin Beroperasi
$sql_jum_admin = "SELECT COUNT(id_admin) AS jumlah_admin FROM tb_admin;";
$result_jum_admin = $conn->query($sql_jum_admin);

// Total Masukan Pengguna
$sql_jum_masukan = "SELECT COUNT(id_masukan) AS jumlah_masukan FROM tb_masukan;";
$result_jum_masukan = $conn->query($sql_jum_masukan);

// Total Fasilitas
$sql_jum_fasilitas = "SELECT COUNT(id_fasilitas) AS jumlah_fasilitas FROM tb_fasilitas;";
$result_jum_fasilitas = $conn->query($sql_jum_fasilitas);

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include("sidebar.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <?php
                            include("topbar.php");
                        ?>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <?php

                            echo "<h3 class='h3 mb-0 text-gray-800'>Selamat Datang, ".$nama_admin."</h3>";
                            
                        ?>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Game -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Game EDUTK</div>
                                            <?php
                                                if ($result_jum_game->num_rows > 0) {
                                                    // Output data setiap baris
                                                    while($row_jum_game = $result_jum_game->fetch_assoc()) {
                                                        echo " 
                                                            <div class='h5 mb-0 font-weight-bold text-gray-800'>".$row_jum_game["jumlah_game"]."</div>
                                                        ";
                                                    }
                                                }
                                            ?>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-gamepad fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Admin Beroperasi -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Admin</div>

                                            <?php
                                                if ($result_jum_admin->num_rows > 0) {
                                                    // Output data setiap baris
                                                    while($row_jum_admin = $result_jum_admin->fetch_assoc()) {
                                                        echo " 
                                                            <div class='h5 mb-0 font-weight-bold text-gray-800'>".$row_jum_admin["jumlah_admin"]."</div>
                                                        ";
                                                    }
                                                }
                                            ?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Masukan Pengguna -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Masukan Pengguna</div>
                                            
                                            <?php
                                                if ($result_jum_masukan->num_rows > 0) {
                                                    // Output data setiap baris
                                                    while($row_jum_masukan = $result_jum_masukan->fetch_assoc()) {
                                                        echo " 
                                                            <div class='h5 mb-0 font-weight-bold text-gray-800'>".$row_jum_masukan["jumlah_masukan"]."</div>
                                                        ";
                                                    }
                                                }
                                            ?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Fitur Fasilitas -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Fitur Fasilitas</div>

                                            <?php
                                                if ($result_jum_fasilitas->num_rows > 0) {
                                                    // Output data setiap baris
                                                    while($row_jum_fasilitas = $result_jum_fasilitas->fetch_assoc()) {
                                                        echo " 
                                                            <div class='h5 mb-0 font-weight-bold text-gray-800'>".$row_jum_fasilitas["jumlah_fasilitas"]."</div>
                                                        ";
                                                    }
                                                }
                                            ?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ADMIN EDUTEKA 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin Keluar Halaman Admin ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="proses/proses-logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>