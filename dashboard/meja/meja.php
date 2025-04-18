<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Meja</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Meja</li>
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
        <a href="?page=meja&action=add" class="btn btn btn-sm btn-primary mb-3">+ Tambah Data</a>
        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel data meja</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nomor Meja</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                  
                  $daftar_meja = mysqli_query($conn, "SELECT * FROM meja") or die(mysqli_error());

                  foreach($daftar_meja as $meja) :
                  
                  ?>
                  
                  <tr>
                    <td><?php echo $meja['nomor_meja'] ?></td>
                    <td>
                        <a href="?page=meja&action=edit&id=<?php echo $meja['idmeja']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a onclick="return confirm('Yakin hapus data?')" href="?page=meja&action=delete&id=<?php echo $meja['idmeja']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nomor Meja</th>
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