<?php 
include 'koneksi.php';
session_start();
if (isset($_POST['BtnCetak'])) {
  $noTransaksi = $_POST['No_trans'];
  $tglTransaksi = $_POST['tgl_trans'];
  $LokAsal = $_POST['lokasi_asal'];
  $LokTujuan = $_POST['lokasi_tujuan'];
  $catatan = $_POST['catatan'];
  
  //formTable
  $kode_brg = $_POST['kode_brg'];
  $kode_rak = $_POST['kode_rak'];
  $qty = $_POST['qty'];
  $idd = $_POST['idd'];
  
  $jml = count($idd);
  for($i = 0; $i < $jml; $i++){
  $queri = mysqli_query($kon, "SELECT * FROM tbl_barang WHERE id='$idd[$i]' AND status='pending'");
  $data = mysqli_fetch_array($queri);
}
if(mysqli_num_rows($queri) >= 1){ 
    
     ?>
    <script type="text/javascript">
        alert("Barang ini berstatus pending !");
        window.location='index.php?halaman=transaksi';
    </script>
     <?php 
}else{
  
  $jum = count($kode_rak);
  
  for($i = 0; $i < $jum; $i++){
 
  $query = mysqli_query($kon, "INSERT INTO `transaksi` (`id`, `id_transaksi`,`id_user`, `kode_rak`,`id_brg`,`kode_brg`, `stok`, `asal`, `tujuan`, `tgl`, `catatan`, `status`)  VALUES ('','$noTransaksi','$_SESSION[id]','$kode_rak[$i]','$idd[$i]','$kode_brg[$i]','$qty[$i]','$LokAsal','$LokTujuan','$tglTransaksi','$catatan','sedang di jalan');");

 $queri = mysqli_query($kon, "Delete from tbl_barang WHERE stok = 0");

  }
    
      if($query){
    ?>
    <script type="text/javascript">
        // alert("Berhasil");
       
        window.location='surat_jalan.php?&no_trans=<?=$noTransaksi ?>', '_blank';
        // window.location='index.php?halaman=transaksi';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("Gagal");
        window.location='index.php?halaman=transaksi';
    </script>
     <?php
}
  
  
}
}


?>