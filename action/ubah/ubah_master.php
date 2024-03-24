<?php 
include '../../koneksi/koneksi.php';

if(isset($_POST['BtnUbah'])){
    
  $kon = mysqli_query($kon, "UPDATE master_brg SET nama_brg='$_POST[nama]', varian='$_POST[varian]' WHERE kode_brg='$_POST[kode]'");

    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='../../index.php?halaman=master';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='../../index.php?halaman=master';
        </script>";
        }

  }
  
  ?>