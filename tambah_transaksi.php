<?php 
include 'koneksi.php';

if (isset($_POST['BtnSimpan'])) {
    $id = $_POST['id'];
    $koderak = $_POST['rak'];
    $id_brg = $_POST['id_brg'];
  $kode = $_POST['kode'];
  $qty = $_POST['qty'];
  $tujuan = $_POST['tujuan'];
  $tgl = $_POST['tgl_trans'];
  $status = $_POST['status'];

  $queri = mysqli_query($kon, "SELECT * FROM tbl_barang WHERE kode_brg='$kode' AND status='pending'");
  $data = mysqli_fetch_array($queri);

if(mysqli_num_rows($queri) >= 1){ 
    
     ?>
    <script type="text/javascript">
        alert("Barang ini berstatus pending !");
        window.location='index.php?halaman=transaksi';
    </script>
     <?php 
     
}else{
    
    $query = mysqli_query($kon, "Insert into transaksi (id_transaksi,id_user,kode_rak,id_brg,kode_brg,stok,tujuan,tgl) VALUES ('','$id','$koderak','$id_brg','$kode','$qty','$tujuan','$tgl');");
  
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

}


?>