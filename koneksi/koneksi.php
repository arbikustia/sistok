<?php
$host = 'localhost';
$user = 'bantuitb_admin';
$password = '@Adeputri99';
$db = 'bantuitb_sistok';

$kon = mysqli_connect($host, $user, $password, $db);
if (!$kon) {
    die('Koneksi gagal:' . mysqli_connect_error());
}
?>
