<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnEdit'])) {
    $kode2 = $_POST['kodeawal'];
    $kodebaru = $_POST['kode'];
   
    $kon = mysqli_query($kon,"UPDATE `tb_rak` SET `NO_RAK` = '$kodebaru' WHERE `tb_rak`.`NO_RAK` = '$kode2';");
 
   
    
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='index.php?halaman=rak';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='index.php?halaman=rak';
        </script>";
        }
        }
        
?>