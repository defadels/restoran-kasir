
<?php

require '../../config/config.php';

if(isset($_POST['submitpelanggan'])) {
  $Namapelanggan = $_POST['Namapelanggan'];
  $Jeniskelamin = $_POST['Jeniskelamin'];
  $Nohp = $_POST['Nohp'];
  $Alamat = $_POST['Alamat'];

  $query = mysqli_query($conn,"INSERT INTO pelanggan(Namapelanggan,Jeniskelamin,Nohp,Alamat)
                        VALUES('$Namapelanggan','$Jeniskelamin','$Nohp','$Alamat')") or die(mysqli_error());

      if($query)
      {
      ?>    
      <script>
          window.location.href="../index.php?page=pesanan&action=add";
      </script>
      <?php   
      }

}


?>