<?php


$tahun = date('Y');

$daftar_pesanan = mysqli_query($conn, "SELECT MONTH(tanggal) AS month, SUM(total) as total FROM pesanan 
            WHERE YEAR(tanggal) = '$tahun' GROUP BY MONTH(tanggal)");

$data_pesanan = array();

$label_pesanan = array();

for($i=1; $i <= 12; $i++)
{
    $month = date('F',mktime(0,0,0,$i,1));

    $total_pesanan = 0;

    foreach($daftar_pesanan as $pesanan)
            {
   
                if(intval($pesanan['month']) == $i)
                {
                    $total_pesanan = $pesanan['total'];
                    break;
                 
                }
            }

    array_push($label_pesanan, $month);
    array_push($data_pesanan, $total_pesanan);

          }



          $encoded_data = json_encode(array_values($data_pesanan));

          $decoded_data = json_decode($encoded_data);
          

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              
              <?php 
                    
                    $query_pesanan = mysqli_query($conn, "SELECT * FROM pesanan")or die(mysqlI_error($conn));
                    
                    $jumlah_pesanan = $query_pesanan->num_rows;

                    ?>

                <h3><?php echo $jumlah_pesanan;  ?></h3>

                <p>Pesanan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">

              <?php

                  $query = mysqli_query($conn, "SELECT SUM(total) AS total_omzet FROM pesanan WHERE tanggal = CURDATE()");
                  $data = mysqli_fetch_assoc($query);

                  $total_omzet = $data['total_omzet'] ?? 0;

              ?>
              
                <h3>Rp.<?php echo number_format($total_omzet); ?></h3>

                <p>Pendapatan Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

              <?php 
                    
                    $query_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan")or die(mysqlI_error($conn));
                    
                    $jumlah_pelanggan = $query_pelanggan->num_rows;

                    ?>

                <h3><?php echo $jumlah_pelanggan; ?></h3>

                <p>Pelanggan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

              <?php
                        $query_menu = mysqli_query($conn, "SELECT * FROM menu")or die(mysqlI_error($conn));
                    
                        $jumlah_menu = $query_menu->num_rows;

                    ?>

                <h3><?php echo $jumlah_menu; ?></h3>

                <p>Menu</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <canvas id="myChart"></canvas>
            <!-- /.card -->

      
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
                <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Restoran Kasir</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">

                  Nama : Leli Nur Hasanah
                  <br>
                  Kelas : Xll PPLG 3 <br>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                Ujian Profesi LSP
                </div>
                <!-- /.card-footer-->
              </div>
            <!-- /.card -->

            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->