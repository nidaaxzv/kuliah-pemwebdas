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
    <title>Pages / Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container-sm p-5">

    <?php
    $id_legal = $_GET['id_legal'];
    // Mengambil data peminjaman barang berdasarkan nim

    $sql = "SELECT * FROM legalisir JOIN mahasiswa ON legalisir.nim = mahasiswa.nim WHERE id_legal='$id_legal'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($result);
    ?>
        <a class="btn btn-close btn-sm" href="data.php"></a>
    <form action="" method="post" class="p-5">
    <h3 class="text-center">Update Data Legalisir</h3>

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
            <label for="inputAlamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="hp" name="hp" value="<?php echo $data['no_hp']; ?>">
        </div>
        <div class="mb-3">
            <label for="inputAlamat" class="form-label">Keperluan</label>
            <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?php echo $data['keperluan']; ?>">
        </div><div class="mb-3">
            <label for="inputAlamat" class="form-label">Tanggal Pengajuan</label>
            <input type="text" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" value="<?php echo $data['tgl_pengajuan']; ?>">
        </div>
        <button type="submit" class="btn btn-success btn-sm" value="simpan" name="proses">Ubah data</button>
    </form>

    <?php
    if (isset($_POST['proses'])) {
        $query = "UPDATE mahasiswa SET nim='$_POST[nim]', nama='$_POST[nm]', jenis_kelamin='$_POST[jk]', jurusan='$_POST[jurusan]', no_hp='$_POST[hp]' WHERE nim='$_POST[nim]';";
        $sql = mysqli_query($conn, $query) or die(mysqli_error(($conn)));
        $query2 = "UPDATE legalisir SET keperluan='$_POST[keperluan]', tgl_pengajuan='$_POST[tgl_pengajuan]' WHERE nim='$_POST[nim]';";
        $sql2 = mysqli_query($conn, $query2) or die(mysqli_error(($conn)));

        if(isset($sql)&&($sql2)) {
            echo "
            <script>
            alert('data berhasil diubah!');
            document.location.href = 'data.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('data gagal diubah!');
            document.location.href = 'data.php';
            </script>
            ";
        }
    }
    ?>

    </div>
</body>

</html>