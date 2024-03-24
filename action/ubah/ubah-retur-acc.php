<?php 
include '../../koneksi/koneksi.php';
session_start(); 


if (isset($_POST['BtnAcc'])) {
    $kode = $_POST['kode_brg'];
    $kon = mysqli_query($kon,"UPDATE retur SET id_user = '$_SESSION[username]', status = 'selesai' WHERE id_transaksi = '$kode';");
    // UPDATE `transaksi` SET `id_user_acc` = 'user002' WHERE `transaksi`.`id` = 22;
      
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='../../index.php?halaman=transaksi';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='../../index.php?halaman=transaksi';
        </script>";
        }
        }
        
?>