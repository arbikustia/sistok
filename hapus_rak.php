<?php 
include 'koneksi.php';

if (isset($_POST['BtnHapus'])) {
   $kon = mysqli_query($kon, "Delete from tb_rak where NO_RAK = '$_POST[kode]'");

   if ($kon) {
   echo "<script>;
   alert('Berhasil');
   document.location= 'index.php?halaman=rak';
   </script>";
   }else{
    echo "<script>;
    alert('Gagal');
    document.location= 'index.php?halaman=rak';
    </script>";
   }
}

?>