<?php 
include 'koneksi.php';

if (isset($_POST['BtnEdit'])) {
    $kon = mysqli_query($kon, "UPDATE user SET username = '$_POST[nama]', password = '$_POST[pass]', level = '$_POST[level]' WHERE id = '$_POST[id]'");
    
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='index.php?halaman=user';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='index.php?halaman=user';
        </script>";
        }
        }
        
?>