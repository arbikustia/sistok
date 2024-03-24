<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnHapus'])) {
   $kon = mysqli_query($kon, "Delete from gudang where id = '$_POST[id]'");

   if ($kon) {
   echo "<script>;
   alert('Berhasil');
   document.location= '../../index.php?halaman=lok';
   </script>";
   }else{
    echo "<script>;
    alert('Gagal');
    document.location= '../../index.php?halaman=lok';
    </script>";
   }
}

?>