<?php

include("../connect.php");
session_start();
if (!isset($_SESSION['id_admin'])) {
    header("Location: login.php");
    exit;
}

// title web header
$title = "DATA ADMIN";
include("header.php");

// mengambil data admin
$sql_admin_data = "SELECT * FROM tb_admin";
$result_admin_data = $conn->query($sql_admin_data);

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

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
                    <h1 class="h3 mb-2 text-gray-800" style="font-weight: bold;">DATA ADMIN</h1>
                    <p class="mb-4">Data List Admin yang Terdaftar
                        <a href="register.php" style="font-weight: bold;">Tambah Data Admin</a>
                    </p>

                    <!-- Form Edit Admin (Awalnya disembunyikan) -->
                    <div id="adminForm" style="display: none; margin-top: 20px;">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">EDIT DATA ADMIN</h6>
                            </div>
                            <div class="card-body">
                                <form action="proses/update-admin.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="adminId">

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" id="adminNama" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" id="adminUsername" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Password (Isi jika ingin mengganti)</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" id="adminEmail" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Nomor WA</label>
                                        <input type="text" name="nomor_wa" id="adminNomorWa" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables All</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Direktori Foto</th>
                                            <th>Nomor WA</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result_admin_data->num_rows > 0) {
                                            while ($row_admin_data = $result_admin_data->fetch_assoc()) {
                                                echo "
                                                    <tr>
                                                        <td>" . $row_admin_data['id_admin'] . "</td>
                                                        <td>" . $row_admin_data["nama"] . "</td>
                                                        <td>" . $row_admin_data["email"] . "</td>
                                                        <td>" . $row_admin_data["direktori_foto"] . "</td>
                                                        <td>" . $row_admin_data["nomor_wa"] . "</td>
                                                        <td>
                                                            <button class='btn btn-info' onclick=\"editAdmin(" . $row_admin_data['id_admin'] . ", '" . $row_admin_data['nama'] . "', '" . $row_admin_data['username'] . "', '" . $row_admin_data['email'] . "', '" . $row_admin_data['nomor_wa'] . "')\">Edit</button>
                                                            <a href='proses/delete-admin.php?id=" . $row_admin_data['id_admin'] . "' class='btn btn-danger' style='margin-top:6px' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>
                                                        </td>
                                                    </tr>
                                                ";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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

    <!-- Script untuk Menampilkan Form -->
    <script>
        function editAdmin(id, nama, username, email, nomor_wa) {
            // Menampilkan form
            document.getElementById('adminForm').style.display = 'block';

            // Mengisi form dengan data yang dipilih
            document.getElementById('adminId').value = id;
            document.getElementById('adminNama').value = nama;
            document.getElementById('adminUsername').value = username;
            document.getElementById('adminEmail').value = email;
            document.getElementById('adminNomorWa').value = nomor_wa;
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
