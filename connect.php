<?php

define('host','localhost');
define('username','root');
define('password','');
define('db','dbSmartRT');

// Definisikan koneksi ke database
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "dbSmartRT";

// Koneksi dan memilih database server
$conn = mysqli_connect(host, username, password, db) or die("Koneksi Gagal");

?>