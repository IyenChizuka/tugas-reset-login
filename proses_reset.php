<?php

include "koneksi.php";
session_start();

$email = $_POST['username']; 
$_SESSION['username'] = $_POST['username'];
$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE username='$email'"));
if ($cek > 0) {
    header('location:newpass.php?email=' . urldecode($email)); 
} else {
    header('location:reset.php?error=email_tidak_ditemukan'); 
}
?>



 
