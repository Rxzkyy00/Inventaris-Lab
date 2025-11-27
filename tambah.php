<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card col-md-6 mx-auto shadow">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Barang</h4>
        </div>

        <div class="card-body">
            <form method="POST">

                <div class="mb-3">
                    <label>Nama Barang</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Kondisi</label>
                    <select name="kondisi" class="form-select" required>
                        <option>Baik</option>
                        <option>Rusak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <select name="lokasi" class="form-select">
                        <option>Lab 1</option>
                        <option>Lab 2</option>
                    </select>
                </div>

                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['simpan'])){
     mysqli_query($connection, "
    INSERT INTO tbl_barang (nama, kondisi, lokasi) VALUES(
        '$_POST[nama]',
        '$_POST[kondisi]',
        '$_POST[lokasi]'
    )
");

    echo "<script>window.location='index.php'</script>";
}
?>
</body>
</html>
