<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reset Password</title>
</head>

<body>
    <div id="form">
        <form action="proses_newpass.php" method="post">
            <h4>Reset Password</h4>
            <p>Silahkan masukkan password baru Anda</p>
            <div class="form-login">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password baru">
            </div>
            <div class="form-login">
                <label for="konfirmasi">Konfirmasi New Password</label>
                <input type="password" name="konfirmasi" id="konfirmasi" placeholder="Konfirmasi password baru">
            </div>
            <div class="form-login">
                <button type="submit">Reset Sekarang</button>
            </div>
            <center><a href="index.php">Kembali ke Halaman Login</a></center>
        </form>
    </div>
</body>

</html>
