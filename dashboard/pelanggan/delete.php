<?php

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM pelanggan WHERE idpelanggan = '$id'") or die(mysqli_error());

if($query)
{
?>    
<script>
    window.location.href="?page=pelanggan&alert=4";
</script>
<?php   
}

?>