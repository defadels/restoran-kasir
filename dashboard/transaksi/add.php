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
                <h3 class="card-title">Tambah data pesanan</h3>
              </div>
              <!-- /.card-header -->
               <!-- form start -->
               <div class="card-body">
               <h3>Tambah Transaksi</h3>
                    <form method="POST">
                    <div class="form-group">
                        <label>ID Pesanan</label>
                        <select name="idpesanan" id="idpesanan" class="form-control">
                        <option value="">Pilih pesanan</option>
                        <?php

                            $pesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE status = 'dibayar' ");

                            

                            while($row = mysqli_fetch_assoc($pesanan)): 
                            
                        ?>
                         
                            <option value="<?= $row['idpesanan'] ?>"><?= $row['invoice'] ?></option>

                        <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nomor meja</label>
                        <input type="text" name="nomor_meja" id="nomor_meja" class="form-control" readonly required>
                    </div>

                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="Namapelanggan" id="namapelanggan" class="form-control" readonly required>
                    </div>

                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" name="Total" id="total"  class="form-control" readonly required>
                    </div>

                    <div class="form-group">
                        <label>Bayar</label>
                        <input type="number" name="Bayar" id="bayar" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Kembalian</label>
                        <input type="number" name="Kembalian" id="kembalian" class="form-control" readonly required>
                    </div>

                    <button name="submit" class="btn btn-primary">Simpan</button>
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
if (isset($_POST['submit'])) {
    $idpesanan = $_POST['idpesanan'];
    $tanggal = date('Y-m-d');
    $nomormeja = $_POST['nomor_meja'];
    $namapelanggan = $_POST['Namapelanggan'];
    $total = $_POST['Total'];
    $bayar = $_POST['Bayar'];
    $kembalian = $_POST['Kembalian'];

    $insert = mysqli_query($conn, "INSERT INTO transaksi (idpesanan, tanggal, Total, Bayar, Kembalian) VALUES ('$idpesanan', '$tanggal', '$total', '$bayar', '$kembalian')");
  
    if ($insert) {
      echo "<script>window.location.href='?page=transaksi.php&alert=1';</script>";
    } else {
      echo "Gagal menambahkan transaksi: " . mysqli_error($koneksi);
    }
  }
?>
