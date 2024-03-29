<?php 
include "koneksi.php";
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

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
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

            <li class="nav-item active">
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
                    //if there's any user action
                    $action = isset ($_POST['action']) ? $_POST['action'] : "";

                    if($action == 'create'){ // the the user submitted the form

                        //include database connection
                        include 'koneksi.php';

                        //our insert query query
                        //$mysqli->real_escape_string() function helps us prevent attack such as SQL injection
                        $query = "Insert into tbl_pesanan set
                                nama_pemesan ='".$mysqli->real_escape_string($_POST['nama_pemesan'])."',
                                nama_mobil ='".$mysqli->real_escape_string($_POST['nama_mobil'])."',
                                id_perjalanan   ='".$mysqli->real_escape_string($_POST['id_perjalanan'])."',
                                harga  ='".$mysqli->real_escape_string($_POST['harga'])."',
                                jenis_bayar  ='".$mysqli->real_escape_string($_POST['jenis_bayar'])."',
                                byk_hari  ='".$mysqli->real_escape_string($_POST['byk_hari'])."',
                                tanggal_ambil  ='".$mysqli->real_escape_string($_POST['tanggal_ambil'])."',
                                tanggal_kembali  ='".$mysqli->real_escape_string($_POST['tanggal_kembali'])."'";
                        
                        //execute the query
                        if($mysqli->query($query)){
                            //if saving success
                            ?>
                                <script type="text/javascript">
                                alert("Pesanan Berhasil Ditambahakan");
                                window.location = 'pesanan.php'; // pake window.location karena redirectnya ada didalam tag script javascript
                                </script>
                            <?php
                        }else{
                            //if unable to create new record
                            ?>
                                <script type="text/javascript">
                                alert("Pesanan Gagal Ditambahkan");
                                window.location = 'pesanan.php'; // pake window.location karena redirectnya ada didalam tag script javascript
                                </script>
                            <?php
                        }
                        //close database connection
                        $mysqli->close();
                    }
                ?>

                <div class="container-fluid">
                    <div class="row">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 col-xl-3 col-md-6 mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Data Pesanan</h1>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-6">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nama_pemesan">Nama Pemesan</label>
                                                <select name="nama_pemesan" id="id_pemesan" class="form-control">
                                                <?php
                                                    $sql = $mysqli->query("select*from tbl_pemesan order by id");
                                                    while($rs=$sql->fetch_object()){
                                                        echo "<option value='$rs->nama_pemesan'>$rs->nama_pemesan</option>";
                                                    }
                                                ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_mobil">Mobil</label>
                                                <select name = 'nama_mobil' class="form-control">
                                                <?php
                                                    $sql = $mysqli->query("select*from tbl_mobil order by id");
                                                    while($rs=$sql->fetch_object()){
                                                        echo "<option value='$rs->merk $rs->nama'>$rs->merk $rs->nama</option>";
                                                    }
                                                ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_perjalanan">Perjalanan</label>
                                                <select name = 'id_perjalanan' class="form-control">
                                                <?php
                                                    $sql = $mysqli->query("select*from tbl_perjalanan order by id");
                                                    while($rs=$sql->fetch_object()){
                                                        echo "<option value='$rs->kota_asal - $rs->kota_tujuan ($rs->jarak km)'>$rs->kota_asal - $rs->kota_tujuan ($rs->jarak km)</option>";
                                                    }
                                                ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga/hari</label>
                                            <input type="number" name="harga" id="harga" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="jenis_bayar">Jenis Pembayaran</label>
                                                <select name = 'jenis_bayar' class="form-control">
                                                    <option value = 'Cash'>Cash</option>
                                                    <option value = 'Debit Card'>Debit Card</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="byk_hari">Lama Rental</label>
                                                <input type="number" name="byk_hari" id="byk_hari" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="tanggal_ambil">Tanggal Pengambilan </label>
                                                <input type="date" name="tanggal_ambil" id="tanggal_ambil" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="tanggal_kembali">Tanggal Pengembalian</label>
                                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                            </div>
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
                        
                        <!-- Daftar Pesanan -->
                        <div class="col-sm-8">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
                                </div>
                                <div class="card-body">

                                    <?php
                                    
                                        include 'koneksi.php';
                                        
                                        $action = isset($_POST['action']) ? $_POST['action'] : "";

                                        //query all records from the database
                                        $query = "select * from tbl_pesanan";

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
                                                    echo "<th>Mobil</th>";
                                                    echo "<th>Jenis Bayar</th>";
                                                    echo "<th>Total</th>";
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
                                                <td><?php echo $row['nama_pemesan'];?></td>
                                                <td><?php echo $row['nama_mobil']; ?></td>
                                                <td><?php echo $row['jenis_bayar']; ?></td>
                                                <td>
                                                    <?php 
                                                        $total = $row['harga']*$row['byk_hari'];
                                                        echo $total;
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href='edit_pesanan.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-info'><i class='fa fa-pen'></i>Edit</a>&nbsp;
                                                    <a href='detail_pesanan.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-warning'><i class='fa fa-eye'></i> Detail</a>&nbsp;
                                                    <a href='hapus_pesanan.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-danger' onclick="return confirm('apakah anda yakin?')"><i class='fa fa-trash'></i>Hapus</a>
                                                </td>
                                            </tr>

                                            <?php
                                            }
                                            ?>	

                                            </tbody>
                                            </table>

                                    <?php

                                        }else{
                                            //if database table is empty
                                            //echo "Data tidak ditemukan";
                                        }
                                        $result->free();
                                        $mysqli->close();

                                    ?>
                                </div><!-- End of Card Body Tabel Pesanan -->
                            </div><!-- End of Card Shadow Body Tabel Pesanan -->
                        </div><!-- End of Tabel Pesanan -->
                    </div><!-- End of row tambah n tabel pesanan -->
                </div><!-- End of container-fluid -->

                <!-- Footer --> 
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span><a>Mohammad Azmi Abdussyukur</a>&copy; RENTCAR 2023</span>
                        </div>
                    </div>
                </footer>

            </div><!-- End of content -->
        </div><!-- End of content-wrapper -->
    </div><!-- End of wrapper-->

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