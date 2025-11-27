<?php 
include "koneksi.php"; 
$data = mysqli_query($connection, "SELECT * FROM tbl_barang WHERE id_barang='$_GET[id]'");
$d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card col-md-6 mx-auto shadow">
        <div class="card-header bg-warning">
            <h4>Edit Barang</h4>
        </div>

        <div class="card-body">
            <form method="POST">

                <div class="mb-3">
                    <label>Nama Barang</label>
                    <input type="text" name="nama" class="form-control" value="<?= $d['nama']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Kondisi</label>
                    <select name="kondisi" class="form-select">
                        <option <?= $d['kondisi']=="Baik"?"selected":""; ?>>Baik</option>
                        <option <?= $d['kondisi']=="Rusak"?"selected":""; ?>>Rusak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <select name="lokasi" class="form-select">
                        <option <?= $d['lokasi']=="Lab 1"?"selected":""; ?>>Lab 1</option>
                        <option <?= $d['lokasi']=="Lab 2"?"selected":""; ?>>Lab 2</option>
                    </select>
                </div>

                <button type="submit" name="update" class="btn btn-warning">Update</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['update'])){
    mysqli_query($connection, "UPDATE tbl_barang SET 
        nama='$_POST[nama]',
        kondisi='$_POST[kondisi]',
        lokasi='$_POST[lokasi]'
    WHERE id_barang='$_GET[id]'");

    echo "<script>window.location='index.php'</script>";
}
?>
</body>
</html>
