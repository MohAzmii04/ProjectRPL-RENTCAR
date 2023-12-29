<?php 
include 'koneksi.php';
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RENTCAR</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
	<!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-60">
                    <i class='fas fa-car-side' style='font-size:48px;color:white'></i>
                </div>
                <div class="sidebar-brand-text mx-3">GO RENT</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="mobil.php">
                    <i class='fas fa-car-side'></i>
                    <span>Data Mobil</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pemesan.php">
                    <i class="fas fa-user"></i>
                    <span>Data Pemesan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="perjalanan.php">
                    <i class="fas fa-road"></i>
                    <span>Data Perjalanan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pesanan.php">
                    <i class="fas fa-receipt"></i>
                    <span>Data Pesanan</span></a>
            </li>

            <!-- Heading -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Pengaturan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="akun.php">
                <i class="fas fa-fw fa-cog"></i>
                    <span>Data Akun</span></a>
            </li>
        
        </ul>
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
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in">
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['name'] ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="logout.php" onclick="return confirm('apakah anda yakin?')">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>
                            </ul>
                    </ul>
                </nav>

                <?php
                    //include database connection
                    include 'koneksi.php';
                    //check any user action
                    $action = isset($_POST['action']) ? $_POST['action'] : "";

                    //select the specific database record to update
                    $query = "select id, merk, nama, warna, no_polisi, jumlah_kursi, tahun_beli
                                from tbl_mobil where id='".$mysqli->real_escape_string($_REQUEST['id'])."'
                                limit 0,1";

                    //execute the query
                    $result = $mysqli->query($query);

                    //get the result
                    $row = $result->fetch_assoc();

                    //asign the result to certain variable so our html form will be filled up with values
                    $id = $row['id'];
                    $merk = $row['merk'];
                    $nama = $row['nama'];
                    $warna = $row['warna'];
                    $no_polisi = $row['no_polisi'];
                    $jumlah_kursi = $row['jumlah_kursi'];
                    $tahun_beli = $row['tahun_beli'];
                ?>

                
                <!-- Detail Mobil-->
                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 col-xl-3 col-md-6 mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Detail Mobil</h1>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            
                        </div>
                    </div>
                    
                    <div class="row">

                        <!-- Tambah Data-->
                        <div class="col-sm-8">
                            <div class="card shadow">

                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Mobil - <?php echo $merk, ' ',$nama ?></h6>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
										    <table class="table table-borderless">
											    <tr>
												    <td>Nama</td>
												    <td>:</td>
												    <td><b><?php echo $merk, ' ',$nama ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Merk</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $merk ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Warna</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $warna ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomer Polisi</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $no_polisi ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah Kursi</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $jumlah_kursi ?> Kursi</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tahun Beli</td>
                                                    <td>:</td>
                                                    <td><b>Tahun <?php echo $tahun_beli ?></b></td>
                                                </tr>
                                            </table>
                                        </div>	
									</div>
                                    <div>
                                        <div class="col">
                                            <a href='edit_mobil.php?id=<?php echo $row['id']; ?>' class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
                                            <a href='hapus_mobil.php?id=<?php echo $row['id']; ?>'' class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                                            <a href='mobil.php' class='btn btn-sm btn-secondary'><i class='fas fa-caret-left'></i> Back</a>
									    </div>
                                    </div>				
                                </div><!-- End of card body Detail Mobil -->
                            </div><!-- End of card shadow Detail Mobil -->
                        </div><!-- End of Detail Mobil -->
                    </div><!-- End of row -->
                </div><!-- End of container-fluid -->
            </div><!-- End of content -->

            <!-- Footer --> 
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span><a>Mohammad Azmi Abdussyukur</a>&copy; RENTCAR 2023</span>
                    </div>
                </div>
            </footer>

        </div><!-- End of content-wrapper -->
    </div><!-- End of wrapper -->

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
