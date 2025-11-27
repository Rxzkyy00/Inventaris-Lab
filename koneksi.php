<?php
//deklasrasi variabel
$buat_host = "localhost";
$buat_user = "root";
$buat_pass = "";
$buat_name = "nm_barang";
$connection = mysqli_connect($buat_host, $buat_user, $buat_pass, $buat_name);
if ($connection) {
    echo "Koneksi Berhasil!";
} else {
    echo "Koneksi Gagal! : " . mysqli_connect_error();
}
