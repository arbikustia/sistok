<?php 
include '../../koneksi/koneksi.php';
session_start(); 

if (isset($_POST['BtnEdit'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
   
    $kon = mysqli_query($kon, "UPDATE `pembayaran_hutang` SET `status` = '$status', `id_user` = '$_SESSION[username]'  WHERE `pembayaran_hutang`.`id` = '$id';");
 
   
    
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='../../index.php?halaman=tambah_pembayaran';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='../../index.php?halaman=tambah_pembayaran';
        </script>";
        }
        }
        
?>