<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnHapus'])) {
   $kon = mysqli_query($kon, "Delete from market_place where id = '$_POST[id]'");

   if ($kon) {
   echo "<script>;
   alert('Berhasil');
   document.location= '../../index.php?halaman=market_place';
   </script>";
   }else{
    echo "<script>;
    alert('Gagal');
    document.location= '../../index.php?halaman=market_place';
    </script>";
   }
}

?>