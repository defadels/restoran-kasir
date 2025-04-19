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
                        <select name="idpesanan" class="form-control">
                        <option value="">Pilih pesanan</option>
                        <?php

                            $pesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE status = 'dibayar' ");


                            // $pesanan = mysqli_query($conn, "SELECT idpesanan FROM pesanan WHERE status='dibayar'");
                            while($row = mysqli_fetch_assoc($pesanan)): 
                            
                        ?>
                         
                            <option value="<?= $row['idpesanan'] ?>"><?= $row['idpesanan'] ?> - Rp<?= number_format($row['total']) ?></option>

                        <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" name="Total" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Bayar</label>
                        <input type="number" name="Bayar" class="form-control" required>
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
    $total = $_POST['Total'];
    $bayar = $_POST['Bayar'];
    $kembalian = $bayar - $total;
  
    $insert = mysqli_query($conn, "INSERT INTO transaksi (idpesanan, tanggal, Total, Bayar, Kembalian) VALUES ('$idpesanan', '$tanggal', '$total', '$bayar', '$kembalian')");
  
    if ($insert) {
      echo "<script>window.location.href='?page=transaksi.php&alert=1';</script>";
    } else {
      echo "Gagal menambahkan transaksi: " . mysqli_error($koneksi);
    }
  }
?>
