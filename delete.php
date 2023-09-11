<?php
    require 'functionss.php';

    $id_legal = $_GET['id_legal'];

    $query = "DELETE from legalisir where id_legal = '$id_legal'";
    mysqli_query($koneksi, $query);
    header('location: data.php');
?>