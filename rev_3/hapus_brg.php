<?php 
include 'koneksi.php';

if (isset($_POST['BtnHapus'])) {
   $kon = mysqli_query($kon, "Delete from tbl_barang where id = '$_POST[id]'");

   if ($kon) {
   echo "<script>;
   alert('Berhasil');
   document.location= 'index.php?halaman=barang';
   </script>";
   }else{
    echo "<script>;
    alert('Gagal');
    document.location= 'index.php?halaman=barang';
    </script>";
   }
}

?>