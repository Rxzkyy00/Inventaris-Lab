<?php
include "koneksi.php";
mysqli_query($connection, "DELETE FROM tbl_barang WHERE id_barang='$_GET[id]'");
echo "<script>window.location='index.php'</script>";
?>
