<?php

$server = 'localhost';
$database = 'tugas_magang';
$username = 'root';
$password = '';

$koneksi = new mysqli($server, $username, $password, $database);

if ($koneksi->connect_errno) {
    echo 'Gagal terkoneksi ke database ' . $database;
}
