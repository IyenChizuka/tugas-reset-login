<?php 
session_start();

include("koneksi.php");
if(!isset($_SESSION['user_id'])){ // Memeriksa jika user_id tidak terdefinisi dalam sesi
    header("Location: login.php");
    exit; // Pastikan untuk exit setelah melakukan redirect
}

// Pastikan $_SESSION['user_id'] sudah terdefinisi sebelum digunakan
if(isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE id=$id");

    // Pastikan variabel diinisialisasi sebelum penggunaan
    $res_Uname = "";
    $res_Email = "";
    $res_tgl = "";
    $days_since_creation = 0;

    while($result = mysqli_fetch_assoc($query)){
        $res_Uname = $result['username'];
        $res_Email = $result['password'];
        $res_tgl = $result['tgl_daftar'];
        $days_since_creation = floor((time() - strtotime($res_tgl)) / (60 * 60 * 24));
    }
}

// Proses logout
if(isset($_GET['logout'])) {
    session_destroy(); // Menghapus semua data sesi
    header("Location: index.php"); // Redirect ke halaman login setelah logout
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Cihu</a> </p>
        </div>

        <div class="right-links">
            
            <a href="home.php?logout=1"> <button class="btn">Keluar</button> </a>
        </div>
    </div>
    <main>
       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Halo <b><?php echo $res_Uname ?></b>, Selamat Datang</p>
            </div>
            <div class="box">
                <p>Email yang kamu gunakan <b><?php echo $res_Uname ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>Akun ini dibuat pada tanggal/waktu <b><?php echo $res_tgl ?></b> (<?php echo $days_since_creation?> hari yang lalu).</p> 
            </div>
          </div>
       </div>
    </main>
</body>
</html>
