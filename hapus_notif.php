<?php 
include 'koneksi.php';

if (isset($_POST['BtnHapus'])) {
   $kon = mysqli_query($kon, "Delete from notif where kode_brg = '$_POST[kode]'");

   if ($kon) {
   echo "<script>;
   alert('Berhasil');
   document.location= 'index.php?halaman=notify';
   </script>";
   }else{
    echo "<script>;
    alert('Gagal');
    document.location= 'index.php?halaman=notify';
    </script>";
   }
}

?>