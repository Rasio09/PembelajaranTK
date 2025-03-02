<?php
    $title = "REGISTER";
    include("header.php");

    include("../connect.php");
    session_start();
    if (!isset($_SESSION['id_admin'])) {
        header("Location: login.php");
        exit;
    }
?>

<body class="bg-gradient-primary">

<div class="container mt-5">

    <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 50px;">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-flex justify-content-center align-items-center">
                    <!-- Gambar di sebelah kiri -->
                    <img src="../img/register.png" alt="Register Image" class="img-fluid " style="object-fit: cover; border-radius: 15px; margin-left: 50px;">
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4" style="font-family=cursive; font-weight: bold;">REGISTRASI ADMIN</h1>
                        </div>
                        <form class="user" method="POST" action="proses/proses-register.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="confirm_password" id="ulangi-password" placeholder="Ulangi Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto">Upload Foto (JPG/PNG)</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept=".jpg, .jpeg, .png" required>
                                <p style="color: red; font-size: 12px;">*maksimal 2 mb (jpg, png)</p>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.php">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
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

</body>

</html>