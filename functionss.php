<?php
    // konfigurasi database
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "akademik_db";

    // perintah php untuk akses ke db
    $conn = mysqli_connect($host, $user, $password, $database);
    if(!$conn) {
        die("Gagal terhubung dengan database : " . mysqli_connect_error());
    }

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function registrasi($data) {
        global $conn;

        $username = ($data["username"]);
        $password = ($data["password"]);
        $password2 = ($data["password2"]);
        $id = "";

        //cek username
        $result = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('username sudah terdaftar!');
            </script>";
            return false;
        }
        //cek konfirmasi pw
        if($password !== $password2) {
            echo "<script>
            alert('konfirmasi password tidak sesuai!');
            </script>";
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO login VALUES('$id','$username', '$password')");

        return mysqli_affected_rows($conn);
    
    }

?>