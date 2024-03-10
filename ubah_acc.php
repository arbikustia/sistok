<?php 
$session_start();
include 'koneksi.php';


if (isset($_POST['BtnEdit'])) {
    $kode = $_POST['kode'];
    $kon = mysqli_query($kon,"UPDATE transaksi SET id_user_acc = '$_SESSION[id_user]', status = 'selesai' WHERE id_transaksi = '$kode';");
    // UPDATE `transaksi` SET `id_user_acc` = 'user002' WHERE `transaksi`.`id` = 22;
    
 
   
    
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