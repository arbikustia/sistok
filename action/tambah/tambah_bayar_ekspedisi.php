<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $tanggal = $_POST['tanggal'];
  $ekspedisi = $_POST['ekspedisi'];
  $marking = $_POST['marking'];
  $estimasi = $_POST['estimasi'];
  $cbm = $_POST['cbm'];
  $harga = $_POST['harga'];
  $tagihan = $_POST['tagihan'];
  $status = $_POST['status'];

  $query = mysqli_query($kon, "INSERT INTO ekspedisi_china (id_ekspedisi, tanggal, marking, estimasi, cbm, harga_percbm, tagihan,status) VALUES ('$ekspedisi','$tanggal','$marking','$estimasi','$cbm','$harga','$tagihan','$status');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='../../index.php?halaman=e_pembayaran';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
       alert("Gagal");
       window.location='../../index.php?halaman=e_pembayaran';
    </script>
     <?php
}


}


?>