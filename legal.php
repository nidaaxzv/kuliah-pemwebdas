<?php
require 'functionss.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages / Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container">
<a class="btn btn-close btn-sm" href="data.php"></a>
    <h2 class="text-center">Legalisir</h2>
    <form method="POST" action="simpan_legal.php">
        <div class="form-group mb-3">
            <label for="nim">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group mb-3">
            <label for="nama_barang">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" required>
        </div>
        <div class="form-group mb-3">
            <label for="unit_barang">Keperluan</label>
            <input type="text" class="form-control" id="kep" name="kep" required>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_peminjaman">Tanggal Pengajuan</label>
            <input type="date" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
