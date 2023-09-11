<?php
    require 'functionss.php';
    //menyimpan data kedalam variabel
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hp = $_POST['no_hp'];

    //upload file
    $temp = $_FILES['ktm']['tmp_name'];
    $ktm = $_FILES['ktm']['name'];
    $folder = "files/";
    move_uploaded_file($temp, $folder, $ktm);
    //query SQL untuk insert data
    $query = "INSERT INTO mahasiswa(nim, nama, jenis_kelamin, jurusan, no_hp, ktm) VALUES(NULL, '$nim','$nama','$jenis_kelamin','$jurusan','$hp','$ktm')";
    mysqli_query($koneksi, $query);
    echo "<script>alert('Data berhasil disimpan.')</script>";
    //mengalihkan halaman 
    header("location:legal.php");
?>