<?php 
include 'koneksi.php';
session_start();

$link = $_GET['link'];

$query = mysqli_query($kon, "SELECT * FROM privileges where id_user = '$_SESSION[id]' AND link='$link'");
$data = mysqli_fetch_array($query);
 
if(mysqli_num_rows($query)>= 1){
    header('location:'. $link);
  }else {
    header('location:index.php?pesan= Anda Tidak Mendapatkan Akses !');
  }

?>