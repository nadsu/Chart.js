<?php
$servername = "localhost";//mendefinisikan variable servername
$username = "root";//mendefinisikan variable username
$password = "";//mendefinisikan variable password
$dbname = "db_penjualan";//mendefinisikan variable dbname

//membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname) or die(mysqli_connect_error());
if (!$conn) { //apabila koneksi tidak tersambung, maka
    die("Connection failed: ".mysqli_connection_error()); //memberikan output error koneksi
}
?>