<?php 
include 'koneksi.php';

if (isset($_POST['BtnEdit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
   
    $kon = mysqli_query($kon,"UPDATE `market_place` SET `nama_market` = '$nama' WHERE `market_place`.`id` = '$id';");
 
   
    
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='index.php?halaman=market_place';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='index.php?halaman=market_place';
        </script>";
        }
        }
        
?>