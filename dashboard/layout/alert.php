<?php
        if(empty($_GET['alert'])) {
            echo "";
        } elseif ($_GET['alert'] == 1) {
            echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h5><i class='icon fas fa-check'></i> Sukses!</h5>
            Data berhasil disimpan.
          </div>";
        } elseif($_GET['alert'] == 2) {
            echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h5><i class='icon fas fa-check'></i> Sukses!</h5>
            Data berhasil diubah.
          </div>";
        } elseif($_GET['alert'] == 3) {
            echo "<div class='alert alert-info alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h5><i class='icon fas fa-info'></i> Gagal!</h5>
            Tidak masuk memasukkan data.
          </div>";
        } elseif($_GET['alert'] == 4) {
          echo "<div class='alert alert-success alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h5><i class='icon fas fa-check'></i> Sukses!</h5>
          Data berhasil dihapus.
        </div>";
      }
    ?>