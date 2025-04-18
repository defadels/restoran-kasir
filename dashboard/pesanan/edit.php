<?php
 
 $idpesanan = $_GET['id'];
 $query_pesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE idpesanan = '$idpesanan'");
 $pesanan = mysqli_fetch_assoc($query_pesanan);
 
 // Fetch detail
 $detail_query = mysqli_query($conn, "SELECT * FROM pesanandetail WHERE idpesanan = '$idpesanan'");
 $pesanan_detail = [];
 while($d = mysqli_fetch_assoc($detail_query)) {
   $pesanan_detail[$d['idmenu']] = $d; // easier access by idmenu
 }

  

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
               <form role="form" method="POST">
                <input type="hidden" name="idpesanan" value="<?= $idpesanan ?>">

            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <select name="idpelanggan" required class="form-control">
                    <?php
                    $pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
                    foreach($pelanggan as $p):
                    ?>
                        <option value="<?= $p['idpelanggan'] ?>" <?= ($p['idpelanggan'] == $pesanan['idpelanggan']) ? 'selected' : '' ?>>
                        <?= $p['Namapelanggan'] ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nomor Meja</label>
                    <select name="idmeja" required class="form-control">
                    <?php
                    $meja = mysqli_query($conn, "SELECT * FROM meja");
                    foreach($meja as $m):
                    ?>
                        <option value="<?= $m['idmeja'] ?>" <?= ($m['idmeja'] == $pesanan['idmeja']) ? 'selected' : '' ?>>
                        <?= $m['nomor_meja'] ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pilih Menu</label>
                    <?php
                    $menu = mysqli_query($conn, "SELECT * FROM menu");
                    foreach($menu as $m):
                    $checked = isset($pesanan_detail[$m['idmenu']]) ? 'checked' : '';
                    $jumlah = $checked ? $pesanan_detail[$m['idmenu']]['Jumlah'] : '';
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="idmenu[]" value="<?= $m['idmenu'] ?>" id="menu<?= $m['idmenu'] ?>" <?= $checked ?>>
                        <label class="form-check-label" for="menu<?= $m['idmenu'] ?>">
                        <?= $m['Namamenu'] ?> - Rp<?= number_format($m['harga']) ?>
                        </label>
                        <input type="number" name="jumlah[<?= $m['idmenu'] ?>]" class="form-control mt-1" value="<?= $jumlah ?>" placeholder="Jumlah" min="1">
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" name="status" id="">
                        <option value="">Pilih Status</option>
                        <option <?php if($pesanan['status'] == 'diproses') { echo 'selected'; } ?> value="diproses">Diproses</option>
                        <option <?php if($pesanan['status'] == 'selesai') { echo 'selected'; } ?> value="selesai">Selesai</option>
                        <option <?php if($pesanan['status'] == 'dibayar') { echo 'selected'; } ?> value="dibayar">Dibayar</option>
                    </select>
                </div>

                <div class="card-footer">
                    <button name="update" type="submit" class="btn btn-success">Update</button>
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
if(isset($_POST['update'])) {
    $idpesanan = $_POST['idpesanan'];
    $idpelanggan = $_POST['idpelanggan'];
    $idmeja = $_POST['idmeja'];
    $status = $_POST['status'];

    // Update pesanan
    $updatePesanan = mysqli_query($conn, "UPDATE pesanan 
                        SET idpelanggan='$idpelanggan', idmeja='$idmeja', status='$status' 
                        WHERE idpesanan='$idpesanan'");

    if($updatePesanan) {
        // Delete old details first
        mysqli_query($conn, "DELETE FROM pesanandetail WHERE idpesanan='$idpesanan'");

        // Insert updated menu selections
        if(isset($_POST['idmenu'])) {
            foreach($_POST['idmenu'] as $idmenu) {
                $jumlah = $_POST['jumlah'][$idmenu] ?? 1;

                $result = mysqli_query($conn, "SELECT harga FROM menu WHERE idmenu = '$idmenu'");
                $data = mysqli_fetch_assoc($result);
                $hargasatuan = $data['harga'];

                mysqli_query($conn, "INSERT INTO pesanandetail (idpesanan, idmenu, jumlah, hargasatuan) 
                              VALUES ('$idpesanan', '$idmenu', '$jumlah', '$hargasatuan')");
            }
        }

        echo "<script>window.location.href='?page=pesanan&alert=2';</script>";
    } else {
        echo "<script>alert('Gagal update');</script>";
    }
}
?>

