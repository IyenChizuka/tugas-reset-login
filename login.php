<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

// Hashing password
$hashed_password = md5($password);

// Mencari pengguna dengan username, password, dan status yang cocok
$query = "SELECT * FROM tbl_users WHERE username='$username' AND password='$hashed_password' AND status='1'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header('Location: home.php'); // Redirect ke halaman dashboard setelah login berhasil
    exit;
} else {
    // Cek apakah pengguna ada tetapi statusnya tidak 1
    $status_check_query = "SELECT * FROM tbl_users WHERE username='$username' AND password='$hashed_password'";
    $status_check_result = mysqli_query($koneksi, $status_check_query);

    if (mysqli_num_rows($status_check_result) > 0) {
        $user = mysqli_fetch_assoc($status_check_result);
        if ($user['status'] == '0') {
            header('Location: index.php?error=Akun Anda tidak aktif. Silakan hubungi administrator.');
        } else {
            header('Location: index.php?error=Akun Anda memiliki status tidak valid.');
        }
    } else {
        header('Location: index.php?error=Email atau password tidak sesuai.');
    }
    exit;
}
?>
