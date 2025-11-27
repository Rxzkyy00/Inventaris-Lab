<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventaris Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h3 class="mb-4">Inventaris Barang Laboratorium</h3>

    <div class="mb-3">
        <a href="tambah.php" class="btn btn-primary">Tambah Barang</a>
        <a href="index.php" class="btn btn-secondary">Semua Barang</a>
        <a href="index.php?filter=rusak" class="btn btn-danger">Barang Rusak</a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kondisi</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $no = 1;

                if(isset($_GET['filter']) && $_GET['filter']=="rusak"){
                    $data = mysqli_query($connection, "SELECT * FROM tbl_barang WHERE kondisi='Rusak'");
                } else {
                    $data = mysqli_query($connection, "SELECT * FROM tbl_barang");

                }

                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td>
                        <span class="badge bg-<?= $d['kondisi']=="Rusak" ? "danger":"success"; ?>">
                            <?= $d['kondisi']; ?>
                        </span>
                    </td>
                    <td><?= $d['lokasi']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $d['id_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?id=<?= $d['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>
    </div>
</div>

</body>
</html>
