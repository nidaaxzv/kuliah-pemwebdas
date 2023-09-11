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
    <title>Pages / Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container-sm p-5">
    <div>
        <a href="homes.php"><img src="icons/homes.png" alt=""></a>
        <a href="logout.php" class="btn btn-danger btn-sm" onclick="return confirmLogout()">Keluar</a>
    </div>
    <h3 style="text-align: center;">Data Legalisir</h3><br>
    <form action="" method="POST">
        <!-- searching -->
        <div style="text-align: center;">
        <input type="text" name="keyword" size="30" placeholder="masukkan keyword" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
        </div>
    </form>
    <br>
        <div class="position-absolute">        
            <a href="form-input.php" class="btn btn-warning btn-sm">Tambah Data</a>
        </div>
        <div class="header-text mb-3 text-end">Export  
        <a href="cetakpdf.php" class="btn btn-dark btn-sm" target="_blank">PDF</a>
        <a href="cetakexcel.php" class="btn btn-dark btn-sm">Excel</a>
        <a href="cetakword.php" class="btn btn-dark btn-sm">Word</a>
        </div>
        <table class="table">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Status</th>
                <th scope="col">KTM</th>
                <th scope="col">Aksi</th>
            </tr>

            <?php
            //pagination
            $jmlDataPerHalaman = 5;
            $sqlJmlData = mysqli_query($conn, "SELECT COUNT(*) AS total FROM mahasiswa JOIN legalisir ON mahasiswa.nim = legalisir.nim");
            $jmlData = mysqli_fetch_assoc($sqlJmlData);
            $jmlHalaman = ceil($jmlData['total'] / $jmlDataPerHalaman);
            $pageOn = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
            $awalData = ($jmlDataPerHalaman*$pageOn)-$jmlDataPerHalaman;

            if( isset($_POST["cari"])) {
                $keywords = $_POST['keyword'];
                $sql = "SELECT * FROM mahasiswa JOIN legalisir ON mahasiswa.nim = legalisir.nim WHERE mahasiswa.nama LIKE '%$keywords%' OR mahasiswa.nim LIKE '%$keywords%' OR mahasiswa.jenis_kelamin LIKE '%$keywords%' OR mahasiswa.jurusan LIKE '%$keywords%'";
            } else {
                $sql = "SELECT * FROM mahasiswa JOIN legalisir ON mahasiswa.nim = legalisir.nim LIMIT $awalData, $jmlDataPerHalaman";
            }
            $result = mysqli_query($conn, $sql);

            $no = 1;
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['nim'] . "</td>";
                echo "<td>" . $row['jurusan'] . "</td>";
                echo "<td>" . $row['keperluan'] . "</td>";
                echo "<td>" . $row['tgl_pengajuan'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>";
                echo "<a href='detail.php?id_legal=$row[id_legal]' class='btn btn-secondary btn-sm'>Detail</a>";
                echo " ";
                echo "<a href='update.php?id_legal=$row[id_legal]' class='btn btn-primary btn-sm'>Update</a>";
                echo " ";
                echo "<a href='javascript:void(0);' class='btn btn-danger btn-sm' onclick='confirmDelete(" . $row['id_legal'] . ")'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            };
            
            $conn->close();
            ?>            
        </table>

        <!-- navigasi !-->
        <?php if( $pageOn > 1) : ?>
            <a href="?halaman=<?= $pageOn - 1; ?>" class="text-black">&laquo;</a>
        <?php endif; ?>

        <?php for( $i = 1; $i <= $jmlHalaman; $i++) : ?>
            <?php if($i == $pageOn) : ?>
                <a href="?halaman=<?= $i; ?>" class="text-danger"><?= $i; ?></a>
            <?php else : ?>
                <a href="?halaman=<?= $i; ?>" class="text-black" ><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if( $pageOn < $jmlHalaman) : ?>
            <a href="?halaman=<?= $pageOn + 1; ?>" class="text-black">&raquo;</a>
            <?php endif; ?>
    </div>
</body>
<script>
    function confirmDelete(id_legal) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            window.location.href = "delete.php?id_legal=" + id_legal;
        }
    }

    function confirmLogout() {
        return confirm("Apakah Anda yakin ingin logout?");
    }
</script>
</html>