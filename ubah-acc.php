<?php 
include 'koneksi.php';

if (isset($_POST['BtnEdit'])) {
    $kon = mysqli_query($kon, "UPDATE transaksi SET id_user_acc = '$_SESSION[id_user]', status = 'selesai' WHERE id_transaksi = '$_POST[kode]'");
    
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='index.php?halaman=transaksi';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='index.php?halaman=transaksi';
        </script>";
        }
        }
        
?>