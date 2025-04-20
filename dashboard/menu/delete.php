<?php

$id = $_GET['id'];

$query_show = mysqli_query($conn, "SELECT * FROM menu WHERE idmenu='$id'")or die(mysqli_error($conn));

$data_lama = $query_show->fetch_assoc();
unlink("../assets/menu".$data_lama['foto']);

$query = mysqli_query($conn, "DELETE FROM menu WHERE idmenu = '$id'") or die(mysqli_error());

if($query)
{
?>    
<script>
    window.location.href="?page=menu&alert=4";
</script>
<?php   
}

?>