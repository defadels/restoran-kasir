<?php

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM meja WHERE idmeja = '$id'") or die(mysqli_error());

if($query)
{
?>    
<script>
    window.location.href="?page=meja&alert=4";
</script>
<?php   
}

?>