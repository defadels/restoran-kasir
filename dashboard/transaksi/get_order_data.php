<?php

require '../../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT 
                                    pesanan.tanggal,
                                    pelanggan.Namapelanggan,
                                    meja.nomor_meja,
                                    pesanan.invoice,
                                    pesanan.total,
                                    pesanan.status
                                    FROM pesanan
                                    JOIN pelanggan ON pesanan.idpelanggan = pelanggan.idpelanggan
                                    JOIN meja ON pesanan.idmeja = meja.idmeja
                                    WHERE idpesanan = '$id'")or die(mysqli_error($conn));

    $data = mysqli_fetch_assoc($query);

    echo json_encode($data);
}
?>