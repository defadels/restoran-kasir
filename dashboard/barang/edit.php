<?php
  use Ramsey\Uuid\Uuid;

  $uuid = Uuid::uuid4();
  
  $id = $_GET['id'];

  $query = mysqli_query($conn, "SELECT * FROM menu WHERE idmenu = '$id'");

  while($menu = mysqli_fetch_assoc($query)){

  

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit data menu</h3>
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
                    <input type="text" value="<?= $menu['Namamenu'] ?>" name="Namamenu" class="form-control" placeholder="Masukkan nomor menu">
                </div>
                
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" value="<?= $menu['harga'] ?>" name="harga" class="form-control" placeholder="Masukkan nomor menu">
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

}


if(isset($_POST['submit'])) {

    $Namamenu = $_POST['Namamenu'];
    $harga = $_POST['harga'];


  
    $query_show = mysqli_query($conn, "SELECT * FROM menu WHERE idmenu='$id'")or die(mysqli_error($conn));

    $data_lama = $query_show->fetch_assoc();

    if($_FILES['foto']['name'] == null){
        
        $foto = $data_lama['foto'];

    } else {

        $foto = $_FILES['foto']['name'];
        unlink("../assets/menu/".$data_lama['foto']);

        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "../assets/menu/".$foto);

    }

  $query = mysqli_query($conn,"UPDATE menu SET Namamenu = '$Namamenu',
                                                harga = '$harga',
                                                foto = '$foto'
                                                WHERE idmenu = '$id'") or die(mysqli_error());

      if($query)
      {
      ?>    
      <script>
          window.location.href="?page=menu&alert=2";
      </script>
      <?php   
      }

}


?>