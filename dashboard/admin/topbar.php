<?php

$sql_admin = "SELECT * FROM tb_admin WHERE id_admin = ?";
$stmt = $conn->prepare($sql_admin);
$stmt->bind_param("i", $_SESSION['id_admin']); // Bind parameter id_admin
$stmt->execute();
$result_admin = $stmt->get_result();

?>

<li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                    // Cek apakah ada data yang ditemukan
                                    if ($result_admin->num_rows > 0) {
                                        // Ambil data admin dari result
                                        $admin_data = $result_admin->fetch_assoc();
                                        
                                        // Ambil nama admin (misalnya kolom 'nama' di database)
                                        $nama_admin = $admin_data['nama']; 
                                        $foto_admin = $admin_data["direktori_foto"];
                                        echo "<span class='mr-2 d-none d-lg-inline      text-gray-600 small'>".$nama_admin."</span>
                                            <img class='img-profile rounded-circle' src='img_admin/".$foto_admin."'>";
                                    }
                                ?>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>