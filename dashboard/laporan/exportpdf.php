<?php

ob_start();

require '../../vendor/autoload.php';
include '../../config/config.php';

$query = mysqli_query($conn, "
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
ORDER BY tanggal DESC
");

$total = 0;
$html = '
<h2 style="text-align:center;">Laporan Penjualan</h2>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
<thead>
  <tr>
     <th>Tanggal</th>
      <th>Invoice</th>
      <th>Nomor Meja</th>
      <th>Nama Pelanggan</th>
      <th>Total</th>
      <th>Status</th>
  </tr>
</thead>
<tbody>';

while($row = mysqli_fetch_assoc($query)) {
  $html .= '
  <tr>
    <td>'.$row['tanggal'].'</td>
    <td>'.$row['invoice'].'</td>
    <td>'.$row['nomor_meja'].'</td>
    <td>'.$row['Namapelanggan'].'</td>
    <td>Rp'.number_format($row['total']).'</td>
    <td>'.$row['status'].'</td>
  </tr>';

}

$html .= '

</tbody>
</table>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
ob_end_clean();
$mpdf->Output('laporan-penjualan.pdf', 'I'); // or 'I' to preview in browser
?>