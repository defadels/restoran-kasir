<?php

ob_start();

require '../../vendor/autoload.php';
include '../../config/config.php';

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
  ORDER BY p.tanggal DESC
");

$total = 0;
$html = '
<h2 style="text-align:center;">Laporan Penjualan</h2>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
<thead>
  <tr>
    <th>Tanggal</th>
    <th>Nama Pelanggan</th>
    <th>Nama Menu</th>
    <th>Jumlah</th>
    <th>Harga</th>
    <th>Subtotal</th>
    <th>Status</th>
  </tr>
</thead>
<tbody>';

while($row = mysqli_fetch_assoc($query)) {
  $html .= '
  <tr>
    <td>'.$row['tanggal'].'</td>
    <td>'.$row['Namapelanggan'].'</td>
    <td>'.$row['Namamenu'].'</td>
    <td>'.$row['jumlah'].'</td>
    <td>Rp'.number_format($row['harga']).'</td>
    <td>Rp'.number_format($row['subtotal']).'</td>
    <td>'.$row['status'].'</td>
  </tr>';
  $total += $row['subtotal'];
}

$html .= '
<tr>
  <td colspan="5" align="right"><strong>Total</strong></td>
  <td colspan="2"><strong>Rp'.number_format($total).'</strong></td>
</tr>
</tbody>
</table>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
ob_end_clean();
$mpdf->Output('laporan-penjualan.pdf', 'I'); // or 'I' to preview in browser
?>