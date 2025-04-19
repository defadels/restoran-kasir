<?php
  use Ramsey\Uuid\Uuid;

  $uuid = Uuid::uuid4();

  $id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM transaksi WHERE idtransaksi = $id"));
  

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit data pesanan</h3>
              </div>
              <!-- /.card-header -->
               <!-- form start -->
               <div class="card-body">
               <h3>Edit Transaksi</h3>
                    <form method="POST">

                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" name="Total" class="form-control" value="<?= $data['Total'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Bayar</label>
                        <input type="number" name="Bayar" class="form-control" value="<?= $data['Bayar'] ?>" required>
                    </div>

                    <button name="submit" class="btn btn-primary">Update</button>
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
    $total = $_POST['Total'];
    $bayar = $_POST['Bayar'];
    $kembalian = $bayar - $total;
  
    $update = mysqli_query($conn, "UPDATE transaksi SET Total='$total', Bayar='$bayar', kembalian='$kembalian' WHERE idtransaksi=$id");
  
    if ($update) {
        echo "<script>window.location.href='?page=transaksi.php&alert=1';</script>";
    } else {
      echo "Gagal update transaksi: " . mysqli_error($conn);
    }
  }
?>
