<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $nama = $_POST['namaMarket'];
 
  $query = mysqli_query($kon, "Insert into market_place (nama_market) VALUES ('$nama');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='../../index.php?halaman=market_place';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
       alert("Gagal");
       window.location='../../index.php?halaman=market_place';
    </script>
     <?php
}


}


?>