<?php

include("../connect.php");
session_start();
if (!isset($_SESSION['id_admin'])) {
    header("Location: login.php");
    exit;
}

// title web header
$title = "DATA FASILITAS";
include("header.php");

// mengambil data 
$sql_fasilitas_data = "SELECT * FROM tb_fasilitas";
$result_fasilitas_data = $conn->query($sql_fasilitas_data);

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
                    <h1 class="h3 mb-2 text-gray-800" style="font-weight: bold;">DATA FASILITAS</h1>
                    <p class="mb-2">Data List Fasilitas</p>
                    <button id='showFormBtnTambah' class='btn btn-primary' style="margin-bottom: 20px;">Tambah Data Fasilitas</button>

                    <!-- Form Tambah Data fasilitas (Awalnya disembunyikan) -->
                    <div id="fasilitasFormTambah" style="display: none; margin-top: 20px;">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA FASILITAS</h6>
                            </div>
                            <div class="card-body">
                                <form action="proses/tambah-fasilitas.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="fasilitasIdtb">

                                    <div class="form-group">
                                        <label>Judul Fasilitas</label>
                                        <input type="text" name="judul_fasilitas" id="judultb" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Isi Fasilitas</label>
                                        <textarea name="isi_fasilitas" id="isitb" class="form-control" required style="height: 120px; resize: none;"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Icon</label>
                                        <input type="text" name="icon_fasilitas" id="icontb" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Color Hover</label>
                                        <select name="color_hover" id="colortb" class="form-control" required>
                                            <option value="danger">Danger</option>
                                            <option value="info">Info</option>
                                            <option value="warning">Warning</option>
                                            <option value="success">Success</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Form Edit fasilitas (Awalnya disembunyikan) -->
                    <div id="fasilitasForm" style="display: none; margin-top: 20px;">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">EDIT DATA FASILITAS</h6>
                            </div>
                            <div class="card-body">
                                <form action="proses/update-fasilitas.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="fasilitasId">

                                    <div class="form-group">
                                        <label>Judul Fasilitas</label>
                                        <input type="text" name="judul_fasilitas" id="judul" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Isi Fasilitas</label>
                                        <textarea name="isi_fasilitas" id="isi" class="form-control" required style="height: 120px; resize: none;"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Icon</label>
                                        <input type="text" name="icon_fasilitas" id="icon" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Color Hover</label>
                                        <!-- Dropdown instead of text input for Color Hover -->
                                        <select name="color_hover" id="color" class="form-control" required>
                                            <option value="danger">Danger</option>
                                            <option value="info">Info</option>
                                            <option value="warning">Warning</option>
                                            <option value="success">Success</option>
                                        </select>
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
                                            <th>Judul Fasilitas</th>
                                            <th>Isi Fasilitas</th>
                                            <th>Icon</th>
                                            <th>Color Hover</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result_fasilitas_data->num_rows > 0) {
                                            while ($row_fasilitas_data = $result_fasilitas_data->fetch_assoc()) {
                                                echo "
                                                    <tr>
                                                        <td>" . $row_fasilitas_data['id_fasilitas'] . "</td>
                                                        <td>" . $row_fasilitas_data["judul_fasilitas"] . "</td>
                                                        <td>" . $row_fasilitas_data["isi_fasilitas"] . "</td>
                                                        <td>" . $row_fasilitas_data["icon"] . "</td>
                                                        <td>" . $row_fasilitas_data["color_hover"] . "</td>
                                                        <td>
                                                            <button class='btn btn-info' onclick=\"editAdmin(" . $row_fasilitas_data['id_fasilitas'] . ", '" . $row_fasilitas_data['judul_fasilitas'] . "', '" . $row_fasilitas_data['isi_fasilitas'] . "', '" . $row_fasilitas_data['icon'] . "', '" . $row_fasilitas_data['color_hover'] . "')\">Edit</button>
                                                            <a href='proses/delete-fasilitas.php?id=" . $row_fasilitas_data['id_fasilitas'] . "' class='btn btn-danger' style='margin-top:6px' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>
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
        document.getElementById('showFormBtnTambah').addEventListener('click', function() {
            var form = document.getElementById('fasilitasFormTambah');
            if (form.style.display === 'none') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        });
    </script>
    
    <!-- Script untuk Menampilkan Form -->
    <script>
        function editAdmin(id, judul, isi, icon, color) {
            // Menampilkan form
            document.getElementById('fasilitasForm').style.display = 'block';

            // Mengisi form dengan data yang dipilih
            document.getElementById('fasilitasId').value = id;
            document.getElementById('judul').value = judul;
            document.getElementById('isi').value = isi;
            document.getElementById('icon').value = icon;
            // Menentukan nilai untuk Color Hover dropdown
            const colorSelect = document.getElementById('color');
            
            // Set selected value based on 'nomor_wa'
            switch (color) {
                case 'danger':
                    colorSelect.value = 'danger';
                    break;
                case 'info':
                    colorSelect.value = 'info';
                    break;
                case 'warning':
                    colorSelect.value = 'warning';
                    break;
                case 'success':
                    colorSelect.value = 'success';
                    break;
                default:
                    colorSelect.value = ''; // Default if no match
            }
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
