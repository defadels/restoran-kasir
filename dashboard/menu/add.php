<?php
  use Ramsey\Uuid\Uuid;

  $uuid = Uuid::uuid4();
  

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah data menu</h3>
              </div>
              <!-- /.card-header -->
               <!-- form start -->
               <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                <div class="form-group">
                    <label for="">Foto Menu</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Nama Menu</label>
                    <input type="text" name="Namamenu" class="form-control" placeholder="Masukkan nama menu">
                </div>


                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukkan harga menu">
                </div>
                     
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      <!-- /.card -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php

  if(isset($_POST['submit'])) {
    $Namamenu = $_POST['Namamenu'];
    $harga = $_POST['harga'];

    $foto 			= $_FILES['foto']['name'];
    $lokasi			= $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../assets/menu/".$foto);

    $query = mysqli_query($conn,"INSERT INTO menu(Namamenu, harga, foto)
                          VALUES('$Namamenu','$harga','$foto')") or die(mysqli_error());

        if($query)
        {
        ?>    
        <script>
            window.location.href="?page=menu&alert=1";
        </script>
        <?php   
        }

  }


?>