<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $tanggal = $_POST['tanggal'];
  $ekspedisi = $_POST['ekspedisi'];
  $marking = $_POST['marking'];
  $estimasi = $_POST['estimasi'];

  $query = mysqli_query($kon, "INSERT INTO ekspedisi_china (id_ekspedisi, tanggal, marking, estimasi) VALUES ('$ekspedisi','$tanggal','$marking','$estimasi');");
 
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
    //    alert("Gagal");
    //    window.location='../../index.php?halaman=e_pembayaran';
    </script>
     <?php
}


}


?>