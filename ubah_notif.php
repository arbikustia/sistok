<?php 
include 'koneksi.php';

if (isset($_POST['BtnEdit'])) {
    $kode = $_POST['kode'];
    $stok = $_POST['maxStok'];
   
    $kon = mysqli_query($kon,"UPDATE `notif` SET `max_stok` = '$stok' WHERE `kode_brg` = '$kode';");
 
   
    
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='index.php?halaman=notify';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='index.php?halaman=notify';
        </script>";
        }
        }
        
?>