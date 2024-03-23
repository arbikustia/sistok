<?php 
include '../../koneksi/koneksi.php';
session_start();

if (isset($_POST['BtnSimpan'])) {
  $tanggal = $_POST['tgl'];
  $marketplace = $_POST['marketplace'];
  $pesanan = $_POST['pesanan'];
  $username = $_POST['username'];
  $refund = $_POST['refund'];
  $sku = $_POST['sku'];
  $harga = $_POST['harga'];
  $qty = $_POST['qty'];
  $jumlah = $_POST['jumlah'];
  $masalah = $_POST['masalah'];
  $status = $_POST['status'];
  $tglNotif = $_POST['tglNotif'];

  echo $tanggal; 
  echo $marketplace;
  echo $pesanan;
  echo $refund;
  echo $sku;
  echo $harga;
  echo $qty;
  echo $jumlah;
  echo $masalah;
  echo $status;
  echo $tglNotif;

  $query = mysqli_query($kon, "INSERT INTO `komplain`(tanggal,id_marketplace,no_pesanan, username, produk, sku, harga, qty, jml_refund, permasalahan, status, notif, update_by) VALUES ('$tanggal','$marketplace','$pesanan','$username','$refund','$sku','$harga','$qty','$jumlah','$masalah','$status','$tglNotif','$_SESSION[username]');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        // window.location='../../index.php?halaman=e_pembayaran';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
       alert("Gagal");
    //    window.location='../../index.php?halaman=e_pembayaran';
    </script>
     <?php
}


}


?>