<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <?php include 'layout/alert.php' ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <!-- <a href="laporan/exportpdf.php" class="btn btn-danger mb-3" target="_blank">Export ke PDF</a> -->

        <!-- Default box -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Pesanan</h3>
              </div>
              <!-- /.card-header -->

                <?php
                     $idpesanan =  $_GET['id'];

                     $query_pesanan = mysqli_query($conn, " 
                        SELECT 
                        pesanan.tanggal,
                        pelanggan.Namapelanggan,
                        meja.nomor_meja,
                        pesanan.invoice,
                        pesanan.total,
                        pesanan.status
                      FROM pesanan
                      JOIN pelanggan ON pesanan.idpelanggan = pelanggan.idpelanggan
                      JOIN meja ON pesanan.idmeja = meja.idmeja
                      WHERE idpesanan = '$idpesanan'
                      ORDER BY tanggal DESC")or die(mysqli_error($conn));

                     
                ?>

              <div class="card-body">
            
              <?php while($pesanan = mysqli_fetch_assoc($query_pesanan)): ?>
                
                <h5>Invoice: <?= $pesanan['invoice'] ?></h5>
                <h5>Tanggal: <?= $pesanan['tanggal'] ?></h5>
                <h5>Nomor Meja: <?= $pesanan['nomor_meja'] ?></h5>
                <h5>Nama Pemesan: <?= $pesanan['Namapelanggan'] ?></h5>
                <h5>Status: <?= ucfirst($pesanan['status']) ?></h5>


              <?php endwhile; ?>
              
              <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                  

                    $query = mysqli_query($conn, "
                    SELECT 
                        p.tanggal,
                        pel.Namapelanggan,
                        m.Namamenu,
                        d.jumlah,
                        d.hargasatuan AS harga,
                        (d.jumlah * d.hargasatuan) AS subtotal,
                        p.status
                    FROM pesanan p
                    JOIN pelanggan pel ON p.idpelanggan = pel.idpelanggan
                    JOIN pesanandetail d ON p.idpesanan = d.idpesanan
                    JOIN menu m ON d.idmenu = m.idmenu
                    WHERE p.idpesanan = '$idpesanan'
                    ORDER BY p.tanggal DESC
                    ");

                    $total = 0;
                    ?>


                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= $row['Namamenu'] ?></td>
                        <td><?= $row['jumlah'] ?></td>
                        <td>Rp<?= number_format($row['harga']) ?></td>
                        <td>Rp<?= number_format($row['subtotal']) ?></td>
                    </tr>
                    <?php $total += $row['subtotal']; ?>
                    <?php endwhile; ?>
                    <tr>
                    <td colspan="3" class="text-right font-weight-bold">Total</td>
                    <td colspan="2" class="font-weight-bold">Rp<?= number_format($total) ?></td>
                    </tr>
                </tbody>
                </table>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      <!-- /.card -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>