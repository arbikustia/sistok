<?php 
include 'koneksi.php';

if (isset($_POST['BtnHapus'])) {


   $kon_get = mysqli_query($kon, "select * from transaksi where id_brg = '$_POST[id_brg]'");
   $getTransaksi = mysqli_fetch_array($kon_get);
   $a = (int)$getTransaksi['stok'];

   $kon_br = mysqli_query($kon, "select * from tbl_barang where id = '$_POST[id_brg]'");
   $getBrg = mysqli_fetch_array($kon_br);
   $b = (int)$getBrg['stok'];

   $stokAwal = $a + $b;

   $updateBrg = mysqli_query($kon, "update tbl_barang set stok = '$stokAwal' where id = '$_POST[id_brg]'");

   if ($updateBrg) {
    $deleteTransaksi = mysqli_query($kon, "delete from transaksi where id_brg = '$_POST[id_brg]'");
   }

   if ($deleteTransaksi) {
   
   echo "<script>;
   alert('Berhasil');
   document.location= 'index.php?halaman=transaksi';
   </script>";
   }else{
    echo "<script>;
    alert('Gagal');
    document.location= 'index.php?halaman=transaksi';
    </script>";
   }
}

?>