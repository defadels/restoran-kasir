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
               <form role="form" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <select name="idpelanggan" required class="form-control">
                            <option value="">Pilih pelanggan</option>
                            <?php
                            $daftar_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan") or die(mysqli_error($conn));
                            foreach($daftar_pelanggan as $pelanggan) :
                            ?>
                            <option value="<?= $pelanggan['idpelanggan'] ?>"><?= $pelanggan['Namapelanggan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Nomor Meja</label>
                        <select name="idmeja" required class="form-control">
                            <option value="">Pilih meja</option>
                            <?php
                            $daftar_meja = mysqli_query($conn, "SELECT * FROM meja") or die(mysqli_error($conn));
                            foreach($daftar_meja as $meja):
                            ?>
                            <option value="<?= $meja['idmeja'] ?>"><?= $meja['nomor_meja'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Menu</label>
                        <?php
                        $daftar_menu = mysqli_query($conn, "SELECT * FROM menu") or die(mysqli_error($conn));
                        foreach($daftar_menu as $menu):
                        ?>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="idmenu[]" value="<?= $menu['idmenu'] ?>" id="menu<?= $menu['idmenu'] ?>">
                            <label class="form-check-label" for="menu<?= $menu['idmenu'] ?>">
                                <?= $menu['Namamenu'] ?> - Rp<?= number_format($menu['harga']) ?>
                            </label>
                            <input type="number" name="jumlah[<?= $menu['idmenu'] ?>]" class="form-control mt-1" placeholder="Jumlah" min="1">
                            </div>
                        <?php endforeach; ?>
                        </div>
                </div>

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
    $idpelanggan = $_POST['idpelanggan'];
    $idmeja = $_POST['idmeja'];
    $iduser = $_SESSION['user']['iduser']; // Pastikan session tersedia
    $tanggal = date('Y-m-d');
    $status = 'diproses';

    // Simpan ke tabel pesanan
    $queryPesanan = mysqli_query($conn, "INSERT INTO pesanan (idpelanggan, idmeja, iduser, tanggal, status) 
                    VALUES ('$idpelanggan', '$idmeja', '$iduser', '$tanggal', '$status')");

    if($queryPesanan) {
        $idpesanan = mysqli_insert_id($conn); // ambil ID terakhir

        // Loop untuk menyimpan detail pesanan
        if(isset($_POST['idmenu'])) {
            foreach($_POST['idmenu'] as $idmenu) {
                $jumlah = $_POST['jumlah'][$idmenu] ?? 1;

                // Ambil harga menu dari DB
                $result = mysqli_query($conn, "SELECT harga FROM menu WHERE idmenu = '$idmenu'");
                $dataMenu = mysqli_fetch_assoc($result);
                $hargasatuan = $dataMenu['harga'];

                mysqli_query($conn, "INSERT INTO pesanandetail (idpesanan, idmenu, jumlah, hargasatuan)
                              VALUES ('$idpesanan', '$idmenu', '$jumlah', '$hargasatuan')");
            }
        }

        echo "<script>window.location.href='?page=pesanan&alert=1';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>
