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
                <h3 class="card-title">Tambah data pelaggan</h3>
              </div>
              <!-- /.card-header -->
               <!-- form start -->
               <form role="form" method="POST">
                <div class="card-body">

                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" name="Namapelanggan" class="form-control" placeholder="Masukkan nama">
                </div>
                  
                 <div class="form-group">
                    <label for="exampleInputEmail1">Nomor HP</label>
                    <input type="text" name="Nohp" class="form-control" id="exampleInputEmail1" placeholder="Masukkan no hp">
                  </div>

                  <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="Jeniskelamin" class="form-control" id="">
                        <option>Pilih data</option>
                        <option value="0">Pria</option>
                        <option value="1">Wanita</option>
                    </select>
                </div>
                  

                  <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="Alamat" id="" cols="30" rows="10" class="form-control" placeholder="Masukkan alamat"></textarea>
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
    $Namapelanggan = $_POST['Namapelanggan'];
    $Jeniskelamin = $_POST['Jeniskelamin'];
    $Nohp = $_POST['Nohp'];
    $Alamat = $_POST['Alamat'];

    $query = mysqli_query($conn,"INSERT INTO pelanggan(Namapelanggan,Jeniskelamin,Nohp,Alamat)
                          VALUES('$Namapelanggan','$Jeniskelamin','$Nohp','$Alamat')") or die(mysqli_error());

        if($query)
        {
        ?>    
        <script>
            window.location.href="?page=pelanggan&alert=1";
        </script>
        <?php   
        }

  }


?>