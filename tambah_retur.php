<?php 
include 'koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $id = $_POST['id'];
  $kode = $_POST['kode'];
  $qty = $_POST['qty'];
  $tgl = $_POST['tgl'];
  $catatan = $_POST['catatan'];

  $query = mysqli_query($kon, "Insert into retur (id_transaksi,kode_brg,qty,tgl,catatan,status) VALUES ('$id','$kode','$qty','$tgl','$catatan','sedang di jalan');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='index.php?halaman=transaksi';
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


?>