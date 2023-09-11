<?php
require 'functionss.php';

$id_legal;
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$kep = $_POST['kep'];
$tgl_pengajuan = $_POST['tgl_pengajuan'];
$sts = "Dikirim";
//query SQL untuk insert data
$query = "INSERT INTO legalisir VALUES('$id_legal','$nama','$nim','$kep','$tgl_pengajuan','$sts')";
mysqli_query($koneksi, $query);
echo "<script>alert('Data berhasil disimpan.')</script>";
header("Location: data.php");

?>
