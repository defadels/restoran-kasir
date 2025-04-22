<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
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
        <a href="?page=transaksi&action=add" class="btn btn btn-sm btn-primary mb-3">+ Tambah Data</a>
        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel data transaksi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Invoice Pesanan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                  
                  $daftar_transaksi = mysqli_query($conn, "  SELECT t.*, p.*
                  FROM transaksi t JOIN pesanan p ON t.idpesanan = p.idpesanan
                ");;
                  ?>
                   <?php $no = 1; foreach ($daftar_transaksi as $d): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['invoice'] ?></td>
                        <td><?= $d['tanggal'] ?></td>
                        <td>Rp<?= number_format($d['Total']) ?></td>
                        <td>Rp<?= number_format($d['Bayar']) ?></td>
                        <td>Rp<?= number_format($d['Kembalian']) ?></td>
                        <td>
                            <a href="?page=transaksi&action=edit&id=<?= $d['idtransaksi'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="?page=transaksi&action=delete&id=<?= $d['idtransaksi'] ?>" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Nomor Meja</th>
                        <th>Dibuat Oleh</th>
                        <th>Status</th>
                        <th>Aksi</th>
                  </tr>
                  </tfoot>
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