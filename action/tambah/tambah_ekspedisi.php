<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $nama = $_POST['namaEkspedisi'];
 
  $query = mysqli_query($kon, "Insert into ekspedisi (nama_ekspedisi) VALUES ('$nama');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='../../index.php?halaman=ekspedisi';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
       alert("Gagal");
       window.location='../../index.php?halaman=ekspedisi';
    </script>
     <?php
}


}


?>