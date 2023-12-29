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
                <div class="sidebar-brand-text mx-3">RENTCAR</sup></div>
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

            <!-- Heading -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="mobil.php">
                    <i class='fas fa-car-side'></i>
                    <span>Data Mobil</span></a>
            </li>

            <li class="nav-item active">
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

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Pengaturan
            </div>

            <li class="nav-item">
                <a class="nav-link" href="pesanan.php">
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
                    //if there's any user action
                    $action = isset ($_POST['action']) ? $_POST['action'] : "";

                    if($action == 'create'){ // the the user submitted the form

                        //include database connection
                        include 'koneksi.php';

                        //our insert query query
                        //$mysqli->real_escape_string() function helps us prevent attack such as SQL injection
                        $query = "Insert into tbl_pemesan set
                                nama_pemesan ='".$mysqli->real_escape_string($_POST['nama_pemesan'])."',
                                gender   ='".$mysqli->real_escape_string($_POST['gender'])."',
                                nik  ='".$mysqli->real_escape_string($_POST['nik'])."',
                                alamat  ='".$mysqli->real_escape_string($_POST['alamat'])."',
                                no_telp ='".$mysqli->real_escape_string($_POST['no_telp'])."'";
                        
                        //execute the query
                        if($mysqli->query($query)){
                            //if saving success
                            echo "<div class='row'>";
                                echo "<div class='col-sm-9'></div>";
                                echo "<div class='col-sm-3 text-right alert alert-success alert-dismissible fade show'>Data berhasil ditambahkan</div>";
                                echo "</div>";
                            echo "</div>";
                        }else{
                            //if unable to create new record
                            echo "<div class='row'>";
                                echo "<div class='col-sm-9'></div>";
                                echo "<div class='col-sm-3 text-right alert alert-success alert-dismissible fade show'>Gagal menambahkan data</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                        //close database connection
                        $mysqli->close();
                    }
                ?>

                <div class="container-fluid">
                    <div class="row">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 col-xl-3 col-md-6 mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Data Pemesan</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">

                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Tambah Data -->
                        <div class="col-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="#" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nama_pemesan">Nama Pemesan</label>
                                            <input type="text" name="nama_pemesan" id="nama_pemesan" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <select name = 'gender' class="form-control">
                                                <option value = 'Laki-laki'>Laki-laki</option>
                                                <option value = 'Perempuan'>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nik_pemesan">NIK Pemesan</label>
                                            <input type="text" name="nik" id="nik" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_pemesan">Alamat Pemesan</label>
                                            <textarea name = 'alamat' id = "alamat" required="required" placeholder="ketik" autocomplete="off" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="telp_pemesan">No. Telepon Pemesan</label>
                                            <input type="text" name="no_telp" id="no_telp" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                                            <input type='hidden' name='action' value='create'/> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End of Tambah Data -->

                        <!-- Daftar Pemesan -->
                        <div class="col-sm-8">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pemesan</h6>
                                </div>
                                <div class="card-body">
                            

                                    <?php
                                    
                                        include 'koneksi.php';
                                        
                                        $action = isset($_POST['action']) ? $_POST['action'] : "";

                                        //query all records from the database
                                        $query = "select * from tbl_pemesan";

                                        //execute the query
                                        $result = $mysqli->query($query);

                                        //get number of rows returned
                                        $num_results = $result->num_rows;

                                        if($num_results > 0){
                                            echo "<table class='table table-bordered' id='dataTable' cellspacing='0'>";
                                            echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>No</th>";
                                                echo "<th>Nama Pemesan</th>";
                                                echo "<th>Jenis Kelamin</th>";
                                                echo "<th>Aksi</th>";
                                            echo "</tr>";
                                            echo "</thead>";

                                            echo "<tbody>";
                                            $no = 1;
                                            while($row = $result->fetch_assoc()){
                                                extract($row);
                                    ?>

                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['nama_pemesan']; ?></td>
                                                <td><?php echo $row['gender']; ?></td>
                                                <td>
                                                    <a href='edit_pemesan.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-info'><i class='fa fa-pen'></i>Edit</a>
                                                    <a href='detail_pemesan.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-warning'><i class='fa fa-eye'></i> Detail</a>
                                                    <a href='hapus_pemesan.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-danger' onclick="return confirm('apakah anda yakin?')"><i class='fa fa-trash'></i>Hapus</a>
                                                </td>
                                            </tr>
                                            
                                            <?php
                                            }
                                            ?>
                                                
                                            </tbody>
                                            </table>
                                            <!-- End of Table -->

                                    <?php
                                    
                                        }else{
                                            //if database table is empty
                                            //echo "Data tidak ditemukan";
                                        }
                                        $result->free();
                                        $mysqli->close();
                                    ?>
                                </div><!-- End of Card Daftar Pemesan -->
                            </div><!-- End of Card shadow Daftar Pemesan -->
                        </div><!-- End of Daftar Pemesan -->
                    </div><!-- End of row tambah data n tabel data -->
                </div><!-- End of container-fluid -->

                <!-- Footer --> 
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span><a>Mohammad Azmi Abdussyukur </a>&copy; RENTCAR 2023</span>
                        </div>
                    </div>
                </footer>

            </div><!-- End of content -->
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
