<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnSimpan'])) {

  $tgl1 = $_POST['tanggal1'];
  $vendor = $_POST['vendor'];
  $tglNotif = $_POST['tglNotif'];


 
  $query = mysqli_query($kon, "INSERT INTO `pembayaran_hutang`(`id`, `id_vendor`, `tanggal`, `status`, `tglNotif`) VALUES ('','$vendor','$tgl1','Belum Bayar','$tglNotif');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='../../index.php?halaman=tambah_pembayaran';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
       alert("Gagal");
       window.location='../../index.php?halaman=tambah_pembayaran';
    </script>
     <?php
}


}


?>