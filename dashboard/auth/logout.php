<?php

session_start();

session_destroy();

echo "<script>alert('Terima Kasih');</script>";
echo "<script>location.href='../index.php';</script>";

?>