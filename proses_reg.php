<?php

include "koneksi.php";

$nama       = $_POST['nama'];
$email      = $_POST['username'];
$nomor      = $_POST['nomor'];
$password   = $_POST['password'];
$konfirmasi = $_POST['konfirmasi'];
$status     = $_POST['status'];

if ($password != $konfirmasi) {
    header('Location: register.php?error=password tidak sama');
    exit;
} else {
    $query = "SELECT * FROM tbl_users WHERE username='$email'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
        header('Location: register.php?error=email sudah digunakan, silahkan coba yang lain!!!');
        exit;
    } else {
        $pass = md5($password);

        $insert_query = "INSERT INTO tbl_users (nama, username, nomor, password, status) 
                         VALUES ('$nama', '$email', '$nomor', '$pass', '$status')";
        $insert = mysqli_query($koneksi, $insert_query);

        if ($insert) {
            echo "<div class='message'>
                      <p>Registrasi Berhasil!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Sekarang</button>";
        } else {
            die("Insert error: " . mysqli_error($koneksi));
        }
    }
}
?>
