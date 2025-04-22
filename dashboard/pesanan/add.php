<?php
  use Ramsey\Uuid\Uuid;

  $uuid = Uuid::uuid4();
  
  function generateUUID($length) {
    $random = '';
    for ($i = 0; $i < $length; $i++) {
      $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
    }
    return $random;
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
                <h3 class="card-title">Tambah data pesanan</h3>
              </div>
              <!-- /.card-header -->
               <!-- form start -->
               <div class="card-body">

               <button name="submit" type="submit" class="btn btn-default mb-4" data-toggle="modal" data-target="#modal-default">+ Tambah Data Pelanggan</button>

                <div class="modal fade" id="modal-default">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Pelanggan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                    <form role="form" action="pesanan/addpelanggan.php" method="POST">
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
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" name="submitpelanggan" class="btn btn-primary">Simpan Data</button>
                      </form>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->


                  <form role="form" method="POST">

                  <div class="form-group">
                    <label for="">Invoice</label>
                    <input type="text" name="invoice" value="INV-<?php echo strtoupper(generateUUID(5)); ?>" class="form-control" readonly>
                </div>

                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <select name="idpelanggan" required class="form-control select2">
                            <option value="">Pilih pelanggan</option>
                            <?php
                            $daftar_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan") or die(mysqli_error($conn));
                            foreach($daftar_pelanggan as $pelanggan) :
                            ?>
                            <option value="<?= $pelanggan['idpelanggan'] ?>"><?= $pelanggan['Namapelanggan'] ?> - <?= $pelanggan['Nohp'] ?></option>
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

                    <div class="table-responsive">
                      <div class="form-group">
                      <label>Menu</label>
                            <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th width="150px">Pilih</th>
                                      <th width="450px">Nama Menu</th>
                                      <th>Harga</th>
                                      <th width="200px">Jumlah</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $daftar_menu = mysqli_query($conn, "SELECT * FROM menu") or die(mysqli_error($conn));
                                  foreach($daftar_menu as $menu):
                                  ?>
                                    <tr>
                                      <td>
                                        <div class="form-check">
                                        <input style="width:60%;" class="form-check-input" type="checkbox" name="idmenu[]" value="<?= $menu['idmenu'] ?>" id="menu<?= $menu['idmenu'] ?>" data-harga="<?= $menu['harga'] ?>">
                                        </div>
                                      </td>
                                      <td>
                                        <img src="../assets/menu/<?= $menu['foto'] ?>" style="width: 10%" alt="">
                                        <label class="form-check-label" for="menu<?= $menu['idmenu'] ?>">
                                          <?= $menu['Namamenu'] ?>
                                        </label>
                                      </td>
                                      <td>
                                      Rp. <?= number_format($menu['harga']) ?>
                                      </td>
                                      <td>
                                      <input type="number" name="jumlah[<?= $menu['idmenu'] ?>]" class="form-control mt-1" placeholder="Jumlah" min="1">
                                      </td>

                                    </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                            </table>
                          
                        </div>
                    </div>

                    <div class="form-group">
                      <label>Total: </label>
                      <h4 id="totalHarga">Rp. 0</h4>
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
    $invoice = $_POST['invoice'];
    $idmeja = $_POST['idmeja'];
    $iduser = $_SESSION['user']['iduser']; // Pastikan session tersedia
    $tanggal = date('Y-m-d');
    $status = 'diproses';
    $total = 0;

    if(isset($_POST['idmenu'])) {
      foreach($_POST['idmenu'] as $idmenu) {
          $jumlah = $_POST['jumlah'][$idmenu] ?? 1;

          // Ambil harga menu dari DB
          $result = mysqli_query($conn, "SELECT harga FROM menu WHERE idmenu = '$idmenu'");
          $dataMenu = mysqli_fetch_assoc($result);
          $hargasatuan = $dataMenu['harga'];

         $total += $hargasatuan * $jumlah;
      }
  }


    // Simpan ke tabel pesanan
    $queryPesanan = mysqli_query($conn, "INSERT INTO pesanan (idpelanggan, idmeja, iduser, tanggal, invoice, status, total) 
                    VALUES ('$idpelanggan', '$idmeja', '$iduser', '$tanggal', '$invoice', '$status', '$total')");

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
