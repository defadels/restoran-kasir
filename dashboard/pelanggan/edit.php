<?php
  use Ramsey\Uuid\Uuid;

  $uuid = Uuid::uuid4();
  
  $id = $_GET['id'];

  $query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE idpelanggan = '$id'");

  while($pelanggan = mysqli_fetch_assoc($query)){

  

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit data pelaggan</h3>
              </div>
              <!-- /.card-header -->
               <!-- form start -->
               <form role="form" method="POST">
                <div class="card-body">

                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" value="<?= $pelanggan['Namapelanggan'] ?>" name="Namapelanggan" class="form-control" placeholder="Masukkan nama">
                </div>
                  
                 <div class="form-group">
                    <label for="exampleInputEmail1">Nomor HP</label>
                    <input type="text" value="<?= $pelanggan['Nohp'] ?>" name="Nohp" class="form-control" id="exampleInputEmail1" placeholder="Masukkan no hp">
                  </div>

                  <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="Jeniskelamin" class="form-control" id="">
                        <option>Pilih data</option>
                        <option <?php if($pelanggan['Jeniskelamin'] == 0){ echo 'selected'; } ?> value="0">Pria</option>
                        <option <?php if($pelanggan['Jeniskelamin'] == 1){ echo 'selected'; } ?> value="1">Wanita</option>
                    </select>
                </div>
                  

                  <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="Alamat" id="" cols="30" rows="10" class="form-control" placeholder="Masukkan alamat"><?= $pelanggan['Alamat'] ?></textarea>
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

    $Namapelanggan = $_POST['Namapelanggan'];
    $Jeniskelamin = $_POST['Jeniskelamin'];
    $Nohp = $_POST['Nohp'];
    $Alamat = $_POST['Alamat'];

  $query = mysqli_query($conn,"UPDATE pelanggan SET Namapelanggan = '$Namapelanggan',
                                                Jeniskelamin = '$Jeniskelamin',
                                                Nohp = '$Nohp',
                                                Alamat = '$Alamat'
                                                WHERE idpelanggan = '$id'") or die(mysqli_error());

      if($query)
      {
      ?>    
      <script>
          window.location.href="?page=pelanggan&alert=2";
      </script>
      <?php   
      }

}


?>