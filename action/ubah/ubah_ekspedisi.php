<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnEdit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
   
    $kon = mysqli_query($kon,"UPDATE `ekspedisi` SET `nama_ekspedisi` = '$nama' WHERE `ekspedisi`.`id` = '$id';");
 
   
    
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='../../index.php?halaman=ekspedisi';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='../../index.php?halaman=ekspedisi';
        </script>";
        }
        }
        
?>