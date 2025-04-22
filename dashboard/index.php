
<?php 

session_start();

require '../config/config.php';
require '../dist/libs/vendor/autoload.php';

// $profil = mysqli_query($conn, "SELECT * FROM profil_toko") or die("Ada kesalahan dalam menjalankan query : ".mysqli_error());
      
// $data = mysqli_fetch_assoc($profil);

if(!isset($_SESSION['user'])) {
	echo "<script>alert('Anda bukan user, tidak bisa akses disini.');</script>";
	echo "<script>document.location.href='../index.php';</script>";
}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php 
  
  if(isset($data) > 0){ echo $data['nama_toko']; } else { echo "Restoran Kasir"; } 
  
  ?></title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="index3.html" class="nav-link">Home</a> -->
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="#" class="nav-link">Contact</a> -->
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <!-- <span class="badge badge-danger navbar-badge">3</span> -->
        </a>
        
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>

      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">
        <?php 
        
    

        
  
          if(isset($data) > 0){ 
            echo $data['nama_toko']; 
          } else { 
            echo "Restoran Kasir"; 
          } 
          
        
        
        ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['user']['role']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if(isset($_GET['page'])){ echo''; } else { echo 'active'; } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

            <?php if($_SESSION['user']['role'] === 'administrator'){  ?>

                <li class="nav-item">
            <a href="?page=pelanggan" class="nav-link <?php if(isset($_GET['page'])) { if($_GET['page'] == 'pelanggan') { echo'active'; } else { echo ''; } } ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Data Pelanggan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="?page=menu" class="nav-link <?php if(isset($_GET['page'])) { if($_GET['page'] == 'menu') { echo'active'; } else { echo ''; } } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Entri Menu
              </p>
            </a>
          </li>
      
          <li class="nav-item">
            <a href="?page=meja" class="nav-link <?php if(isset($_GET['page'])){ if($_GET['page'] == 'meja'){ echo'active';  } else { echo ''; } } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Entri Meja
              </p>
            </a>
           
          </li>

          <!-- <li class="nav-item">
            <a href="?page=barang" class="nav-link <?php if(isset($_GET['page'])){ if($_GET['page'] == 'barang'){ echo'active';  } else { echo ''; } } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Entri Barang
              </p>
            </a>
           
          </li> -->


            <?php } ?>


            <?php if($_SESSION['user']['role'] === 'waiter'){  ?>

                <li class="nav-item">
            <a href="?page=barang" class="nav-link <?php if(isset($_GET['page'])){ if($_GET['page'] == 'barang'){ echo'active';  } else { echo ''; } } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Entri Barang
              </p>
            </a>
           
          </li>

                
          <li class="nav-item">
            <a href="?page=pesanan" class="nav-link <?php if(isset($_GET['page'])){ if($_GET['page'] == 'pesanan'){ echo'active';  } else { echo ''; } } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Entri Order
              </p>
            </a>
            </li>

            <li class="nav-header">Dokumen</li>
          <li class="nav-item">
            <a href="?page=laporan" class="nav-link <?php if(isset($_GET['page'])) { if($_GET['page'] == 'laporan') { echo'active'; } else { echo ''; } } ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>Generate Laporan</p>
            </a>
          </li>
        
            <?php } ?>

            
            <?php if($_SESSION['user']['role'] === 'kasir'){  ?>


                <li class="nav-item">
            <a href="?page=transaksi" class="nav-link <?php if(isset($_GET['page'])){ if($_GET['page'] == 'transaksi'){ echo'active';  } else { echo ''; } } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Entri Transaksi
              </p>
            </a>
           
          </li>
            
          <li class="nav-header">Dokumen</li>
          <li class="nav-item">
            <a href="?page=laporan" class="nav-link <?php if(isset($_GET['page'])) { if($_GET['page'] == 'laporan') { echo'active'; } else { echo ''; } } ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>Generate Laporan</p>
            </a>
          </li>

        <?php } ?>

        <?php if($_SESSION['user']['role'] === 'owner'){  ?>
            

            <li class="nav-header">Dokumen</li>
          <li class="nav-item">
            <a href="?page=laporan" class="nav-link <?php if(isset($_GET['page'])) { if($_GET['page'] == 'laporan') { echo'active'; } else { echo ''; } } ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>Generate Laporan</p>
            </a>
          </li>
    
            <?php } ?>


            <li class="nav-header">Auth</li>
          <li class="nav-item">
            <a onclick="return confirm('Mau logout?')" href="auth/logout.php" confirm="" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
     
  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

<?php


  if(isset($_GET['page'])){

    if($_GET['page'] == 'meja')
    {
      include "meja/meja.php";

      if(isset($_GET['action'])){
        if($_GET['action'] == "add"){
          include "meja/add.php";
        }elseif($_GET['action'] == "edit"){
          include "meja/edit.php";
        }elseif($_GET['action'] == "delete"){
          include "meja/delete.php";
        }
      }
    }

    else if($_GET['page'] == 'menu'){
      include "menu/menu.php";

      if(isset($_GET['action'])){
        if($_GET['action'] == "add"){
          include "menu/add.php";
        }elseif($_GET['action'] == "edit"){
          include "menu/edit.php";
        }elseif($_GET['action'] == "delete"){
          include "menu/delete.php";
        }
      }

    }

    else if($_GET['page'] == 'pelanggan'){
      include "pelanggan/pelanggan.php";

      if(isset($_GET['action'])){
        if($_GET['action'] == "add"){
          include "pelanggan/add.php";
        }elseif($_GET['action'] == "edit"){
          include "pelanggan/edit.php";
        }elseif($_GET['action'] == "delete"){
          include "pelanggan/delete.php";
        }
      }

    }

    
    else if($_GET['page'] == 'barang'){
        include "barang/barang.php";
      
        if(isset($_GET['action'])){
            if($_GET['action'] == "add"){
              include "barang/add.php";
            }elseif($_GET['action'] == "edit"){
              include "barang/edit.php";
            }elseif($_GET['action'] == "delete"){
              include "barang/delete.php";
            }
          }
    }


    else if($_GET['page'] == 'transaksi'){
        include "transaksi/transaksi.php";
      
        if(isset($_GET['action'])){
            if($_GET['action'] == "add"){
              include "transaksi/add.php";
            }elseif($_GET['action'] == "edit"){
              include "transaksi/edit.php";
            }elseif($_GET['action'] == "delete"){
              include "transaksi/delete.php";
            }
          }
    }
   
    else if($_GET['page'] == 'pesanan'){
        include "pesanan/pesanan.php";
      
        if(isset($_GET['action'])){
            if($_GET['action'] == "add"){
              include "pesanan/add.php";
            }elseif($_GET['action'] == "edit"){
              include "pesanan/edit.php";
            }elseif($_GET['action'] == "delete"){
              include "pesanan/delete.php";
            }elseif($_GET['action'] == "show"){
              include "pesanan/show.php";
            }
          }
    }
   
    else if($_GET['page'] == 'laporan'){
        include "laporan/laporan.php";
    }

    else if($_GET['page'] == 'exportpdf'){
      include "laporan/exportpdf.php";
  }

  } else {
    include "dashboard.php";
  }

  ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2025 <a href="http://tokojaya.io"></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Made by</b>Leli Nur Hasanah

    </div>
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/checkprice.js"></script>
<script src="../dist/js/transaction.js"></script>


<script src="../dist/js/demo.js"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

    var bulan_produksi = <?php echo json_encode($label_pesanan); ?>;
    var jumlah_pesanan = <?php echo $encoded_data; ?>;

  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: bulan_produksi,
      datasets: [{
        label: 'Penjualan',
        data: jumlah_pesanan,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  $(document).ready(function() {
        $('#js-example-basic-single').select2();
    });


  $(function () {
    $('.select2').select2()

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


</script>

</body>
</html>
