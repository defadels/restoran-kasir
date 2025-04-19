<?php

$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM transaksi WHERE idtransaksi=$id");

if ($delete) {
    echo "<script>window.location.href='?page=transaksi.php&alert=1';</script>";
} else {
  echo "Gagal menghapus transaksi: " . mysqli_error($conn);
}
