<?php
  use Ramsey\Uuid\Uuid;

  $uuid = Uuid::uuid4();
  
  $id = $_GET['id'];

  $query = mysqli_query($conn, "SELECT * FROM meja WHERE idmeja = '$id'");

  while($meja = mysqli_fetch_assoc($query)){

  

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit data meja</h3>
              </div>
              <!-- /.card-header -->
               <!-- form start -->
               <form role="form" method="POST">
                <div class="card-body">

                <div class="form-group">
                    <label for="">Nomor Meja</label>
                    <input type="text" value="<?= $meja['nomor_meja'] ?>" name="nomor_meja" class="form-control" placeholder="Masukkan nomor meja">
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

    $nomor_meja = $_POST['nomor_meja'];

  $query = mysqli_query($conn,"UPDATE meja SET nomor_meja = '$nomor_meja',
                                                WHERE idmeja = '$id'") or die(mysqli_error());

      if($query)
      {
      ?>    
      <script>
          window.location.href="?page=meja&alert=2";
      </script>
      <?php   
      }

}


?>