<?php
session_start();
require 'functionss.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages / Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container-sm p-7">
    <?php
    $id_legal = $_GET['id_legal'];

    $sql = "SELECT * FROM legalisir JOIN mahasiswa ON legalisir.nim = mahasiswa.nim WHERE id_legal='$id_legal'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($result);
    ?>
        <a class="btn btn-close btn-sm" href="data.php"></a>
    <form action="" method="post" class="p-5">
    <h3 class="text-center">Detail Data Mahasiswa</h3>
        <br>
        <div class="mb-3">
            <label for="inputNik" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nm" value="<?php echo $data['nama']; ?>">
        </div>
        <div class="mb-3">
            <label for="inputNama" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $data['nim']; ?>">
        </div>
        <div class="mb-3">
            <label for="selectJk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" aria-label="Default select example" name="jk">
                <?php
                echo "<option value='$data[jenis_kelamin]'>$data[jenis_kelamin]</option>";
                ?>
                <option value="l">L</option>
                <option value="P">P</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="inputNama" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $data['jurusan']; ?>">
        </div>
        <div class="mb-3">
            <label for="inputAlamat" class="form-label">No. Handphone</label>
            <input type="text" class="form-control" id="hp" name="hp" value="<?php echo $data['no_hp']; ?>">
        </div>
        <div class="mb-3">
            <label for="inputAlamat" class="form-label">Keperluan</label>
            <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?php echo $data['keperluan']; ?>">
        </div><div class="mb-3">
            <label for="inputAlamat" class="form-label">Tanggal Pengajuan</label>
            <input type="text" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" value="<?php echo $data['tgl_pengajuan']; ?>">
        </div>
        <br>
        <a href="data.php" class="btn btn-info btn-sm">Kembali</a>
    </form>


    </div>
</body>

</html>