<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
$sql = "SELECT * FROM mahasiswa JOIN legalisir ON mahasiswa.nim = legalisir.nim";
$result = mysqli_query($koneksi, $sql);


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legalisir - Data</title>
    <link rel="stylesheet" href="print.css">
</head>

<body>
<h3>Data Legalisir</h3>
    <br>
        <table border="1" cellpadding="10" cellspacing="0" style="font-family: frutiger">

            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Status</th>
            </tr>';

            $no = 1;
            foreach ($result as $row) {
                $html .='<tr>
                        <td>'. $no++ .'</td>
                        <td>'. $row["nama"] .'</td>
                        <td>'. $row["nim"] .'</td>
                        <td>'. $row["jenis_kelamin"] .'</td>
                        <td>'. $row["jurusan"] .'</td>
                        <td>'. $row["keperluan"] .'</td>
                        <td>'. $row["tgl_pengajuan"] .'</td>
                        <td>'. $row["status"] .'</td>
                </tr>';
            }
            
$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('Data Legalisir.pdf','I');

?>