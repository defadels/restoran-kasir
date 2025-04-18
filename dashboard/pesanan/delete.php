<?php

$idpesanan = $_GET['id'];

// Step 1: Delete all related pesanandetail
mysqli_query($conn, "DELETE FROM pesanandetail WHERE idpesanan = '$idpesanan'");

// Step 2: Delete main pesanan
$deletePesanan = mysqli_query($conn, "DELETE FROM pesanan WHERE idpesanan = '$idpesanan'");

if($deletePesanan) {
    echo "<script>window.location.href='?page=pesanan&alert=3';</script>";
} else {
    echo "<script>alert('Gagal menghapus pesanan');</script>";
}
?>
