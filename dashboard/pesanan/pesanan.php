<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pesanan</li>
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
        <a href="?page=pesanan&action=add" class="btn btn btn-sm btn-primary mb-3">+ Tambah Data</a>
        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel data pesanan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th>Nomor Meja</th>
                    <th>Dibuat Oleh</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                  
                  $daftar_pesanan = mysqli_query($conn, "SELECT pelanggan.Namapelanggan, meja.nomor_meja, user.Namauser, pesanan.tanggal, pesanan.idpesanan, pesanan.status FROM pesanan
                  INNER JOIN pelanggan ON pesanan.idpelanggan = pelanggan.idpelanggan
                  INNER JOIN meja ON pesanan.idmeja = meja.idmeja
                  INNER JOIN user ON pesanan.iduser = user.iduser") or die(mysqli_error());

                  foreach($daftar_pesanan as $pesanan) :
                  
                  ?>
                  
                  <tr>
                      <td><?php echo $pesanan['tanggal'] ?></td>
                    <td><?php echo $pesanan['Namapelanggan'] ?></td>
                    <td><?php echo $pesanan['nomor_meja'] ?></td>
                    <td><?php echo $pesanan['Namauser'] ?></td>
                    <td><?php echo $pesanan['status'] ?></td>
                    <td>
                        <a href="?page=pesanan&action=edit&id=<?php echo $pesanan['idpesanan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a onclick="return confirm('Yakin hapus data?')" href="?page=pesanan&action=delete&id=<?php echo $pesanan['idpesanan']; ?>" class="btn btn-danger btn-sm">Hapus</a>
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