<?php
require 'functionss.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages / Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h3 class="text-center">FORM DATA MAHASISWA</h3>
    <form method="POST" action="simpan_mhs.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td>NIM</td>
                <td ><input class="input-group mb-1" type="text" name="nim"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input class="input-group mb-1" type="text" name="nama"></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td><input type="radio" name="jenis_kelamin" value="L">Laki-Laki
                <input type="radio" name="jenis_kelamin" value="P">Perempuan
            </td>
            </tr>
            <tr>
                <td class="input-group mb-1">JURUSAN</td>
                <td>
                    <select name="jurusan" >
                        <option value="KIMIA">Pilih</option>
                        <option value="KIMIA">KIMIA</option>
                        <option value="FISIKA">FISIKA</option>
                        <option value="FARMASI">FARMASI</option>
                        <option value="BIOLOGI">BIOLOGI</option>
                        <option value="KIMIA">ILKOM</option>
                        <option value="KIMIA">STATISTIKA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>NO. HANDPHONE</td>
                <td><input class="input-group mb-1" type="text" name="hp"></td>
            </tr>
            <tr>
                <td>UPLOAD KTM</td>
                <td><input class="input-group mb-1" type="file" name="ktm"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" value="simpan" class='btn btn-primary btn-sm'>SIMPAN</button></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>