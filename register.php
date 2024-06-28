<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div id="form">
        <form action="proses_reg.php" method="post">
            <h4>Selamat Datang</h4>
            <p>Silahkan buat akun anda</p>
            <div class="form-login">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" placeholder="masukkan nama anda">
            </div>
            <div class="form-login">
                <label for="nomor">Nomor Telp</label>
                <input type="text" name="nomor" id="nomor" placeholder="08xxxxxxxxx">
            </div>
            <div class="form-login">
                <label for="username">Email</label>
                <input type="email" name="username" id="username" placeholder="masukkan email">
            </div>
            <div class="form-login">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="masukkan password">
            </div>
            <div class="form-login">
                <label for="konfirmasi">Konfirmasi Password</label>
                <input type="password" name="konfirmasi" id="konfirmasi" placeholder="masukkan password">
            </div>
             <input type="hidden" name="status" value="1">
            <div class="form-login">
                <button type="submit">Daftar Sekarang</button>
            </div>
            <center><a href="index.php">Sudah punya akun? Login Sekarang</a></center>
        </form>
    </div>
</body>

</html>