<?php
    $host="localhost";
    $user="sistokmy_rott";
    $password="@Adeputri99";
    $db="sistokmy_sistok";
    
    $kon = mysqli_connect($host,$user,$password,$db);
    if (!$kon){
          die("Koneksi gagal:".mysqli_connect_error());
    }
?>