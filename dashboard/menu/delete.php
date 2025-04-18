<?php

$id = $_GET['id'];

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