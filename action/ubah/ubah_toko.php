<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnEdit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
   
    $kon = mysqli_query($kon,"UPDATE `toko` SET `nama_toko` = '$nama' WHERE `toko`.`id` = '$id';");
 
   
    
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='../../index.php?halaman=toko';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='../../index.php?halaman=toko';
        </script>";
        }
        }
        
?>