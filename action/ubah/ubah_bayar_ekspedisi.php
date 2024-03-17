<?php 
include '../../koneksi/koneksi.php';
session_start(); 

if (isset($_POST['BtnEdit'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $ekspedisi = $_POST['ekspedisi'];
    $marking = $_POST['marking'];
    $estimasi = $_POST['estimasi'];

    $kon = mysqli_query($kon, "UPDATE `ekspedisi_china` SET `tanggal` = '$tanggal', `id_ekspedisi` = '$ekspedisi', `marking` = '$marking', `estimasi` = '$estimasi' WHERE `ekspedisi_china`.`id` = '$id';");
  
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='../../index.php?halaman=e_pembayaran';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='../../index.php?halaman=e_pembayaran';
        </script>";
        }
        }
        
?>