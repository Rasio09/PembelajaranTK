<?php

include("connect.php");

// lihat game list
$sql_game_list = "SELECT * FROM tb_gamelist";
$result_game_list = $conn->query($sql_game_list);

?>
 
 
 <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <h1 class="m-0 text-primary" style="font-family:cursive; font-size: 35px ;"><i class="me-3"><img src="img/logo.png" style="width: 100px;" alt=""></i>EDUTK Games</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto" style="font-size: large;">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Games List</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">

                        <!-- Menampilkan setiap game list pada navbar -->
                        <?php
                            if ($result_game_list->num_rows > 0) {
                                // Output data setiap baris
                                while($row_game_list = $result_game_list->fetch_assoc()) {
                                    echo " 
                                        <a href='folder_game/".$row_game_list["direktori_file"]."' class='dropdown-item'>".$row_game_list["judul_game"]."</a>
                                    ";
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <a href="masukan.php" class="nav-item nav-link">Message</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->