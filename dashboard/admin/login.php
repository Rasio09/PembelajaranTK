<?php
    $title = "LOGIN ADMIN";
    include("header.php");
?>

<body class="bg-gradient-info">

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <!-- Gambar di sebelah kiri -->
                        <img src="../img/login.jpg" alt="Background Image" class="img-fluid h-100 w-100" style="object-fit: cover;">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4" style="font-family: cursive; font-weight: bold;">LOGIN ADMIN</h1>
                            </div>
                            <form class="user" method="POST" action="proses/proses-login.php">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username"
                                        id="username" placeholder="Username" 
                                        value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        id="password" placeholder="Password"
                                        value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember"
                                            <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" style="font-weight: bold;">Login</button>
                            </form>

                            <hr>

                        </div>
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