<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php include 'layout/alert.php' ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <a href="laporan/exportpdf.php" class="btn btn-danger mb-3" target="_blank">Export ke PDF</a>

        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel data meja</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = mysqli_query($conn, "
                      SELECT 
                        p.tanggal,
                        pel.Namapelanggan,
                        m.Namamenu,
                        d.jumlah,
                        d.hargasatuan AS harga,
                        (d.jumlah * d.hargasatuan) AS subtotal,
                        p.status
                      FROM pesanan p
                      JOIN pelanggan pel ON p.idpelanggan = pel.idpelanggan
                      JOIN pesanandetail d ON p.idpesanan = d.idpesanan
                      JOIN menu m ON d.idmenu = m.idmenu
                      ORDER BY p.tanggal DESC
                    ");
                    
                    $total = 0;
                
                    
                    
                    while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['Namapelanggan'] ?></td>
                        <td><?= $row['Namamenu'] ?></td>
                        <td><?= $row['jumlah'] ?></td>
                        <td>Rp<?= number_format($row['harga']) ?></td>
                        <td>Rp<?= number_format($row['subtotal']) ?></td>
                        <td><?= $row['status'] ?></td>
                    </tr>
                    <?php $total += $row['subtotal']; ?>
                    <?php endwhile; ?>
                    <tr>
                    <td colspan="5" class="text-right font-weight-bold">Total</td>
                    <td colspan="2" class="font-weight-bold">Rp<?= number_format($total) ?></td>
                    </tr>
                </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      <!-- /.card -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>