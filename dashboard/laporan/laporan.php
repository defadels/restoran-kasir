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
                    <th>Invoice</th>
                    <th>Nomor Meja</th>
                    <th>Nama Pelanggan</th>
                    <th>Total</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = mysqli_query($conn, "
                      SELECT 
                        pesanan.tanggal,
                        pelanggan.Namapelanggan,
                        meja.nomor_meja,
                        pesanan.invoice,
                        pesanan.total,
                        pesanan.status
                      FROM pesanan
                      JOIN pelanggan ON pesanan.idpelanggan = pelanggan.idpelanggan
                      JOIN meja ON pesanan.idmeja = meja.idmeja
                      ORDER BY tanggal DESC
                    ");
                
                    
                    
                    while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['invoice'] ?></td>
                        <td><?= $row['nomor_meja'] ?></td>
                        <td><?= $row['Namapelanggan'] ?></td>
                        <td>Rp<?= number_format($row['total']) ?></td>
                        <td><?= $row['status'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                   
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