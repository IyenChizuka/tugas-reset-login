<?php

include "koneksi.php";
session_start();

if (isset($_POST['password']) && isset($_POST['konfirmasi'])) {
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    // Ambil email dari sesi
    $email = $_SESSION['username'];

    // Cek apakah password dan konfirmasi password sama
    if ($password == $konfirmasi) {
        // Gunakan MD5 untuk password baru
        $hashed_password = md5($password);

        // Update password di database dengan MD5
        $update = mysqli_query($koneksi, "UPDATE tbl_users SET password='$hashed_password' WHERE username='$email'");

        if ($update) {
            // Periksa apakah query berhasil mengupdate baris
            if (mysqli_affected_rows($koneksi) > 0) {
                // Redirect ke halaman login dengan pesan sukses
                header('Location: index.php?success=1');
                exit; // Exit script setelah melakukan redirect
            } else {
                // Redirect kembali ke halaman newpass dengan pesan error bahwa tidak ada baris yang diupdate
                header('Location: newpass.php?error=4_tidak_ada_baris_yang_diupdate');
                exit; // Exit script setelah melakukan redirect
            }
        } else {
            // Redirect kembali ke halaman newpass dengan pesan error
            header('Location: newpass.php?error=1');
            exit; // Exit script setelah melakukan redirect
        }
    } else {
        // Redirect kembali ke halaman newpass dengan pesan password tidak cocok
        header('Location: newpass.php?error=2_password_tidak_sama');
        exit; // Exit script setelah melakukan redirect
    }
} else {
    // Redirect kembali ke halaman newpass dengan pesan form tidak lengkap
    header('Location: newpass.php?error=3');
    exit; // Exit script setelah melakukan redirect
}
?>

