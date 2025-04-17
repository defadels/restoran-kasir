<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pelanggan</li>
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
        <a href="?page=pelanggan&action=add" class="btn btn btn-sm btn-primary mb-3">+ Tambah Data</a>
        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel data produk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Hp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                  
                  $daftar_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan") or die(mysqli_error());

                  foreach($daftar_pelanggan as $pelanggan) :
                  
                  ?>
                  
                  <tr>
                    <td><?php echo $pelanggan['Namapelanggan'] ?></td>
                    <td><?php echo $pelanggan['Jeniskelamin'] ?></td>
                    <td><?php echo $pelanggan['Nohp'] ?></td>
                    <td><?php echo $pelanggan['Alamat'] ?></td>
                    <td>
                        <a href="?page=pelanggan&action=edit&id=<?php echo $pelanggan['idpelanggan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a onclick="return confirm('Yakin hapus data?')" href="?page=pelanggan&action=delete&id=<?php echo $pelanggan['idpelanggan']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Hp</th>
                    <th>Alamat</th>
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