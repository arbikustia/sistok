<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $nama = $_POST['namaVendor'];
 
  $query = mysqli_query($kon, "Insert into vendor (nama_vendor) VALUES ('$nama');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='../../index.php?halaman=vendor';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
       alert("Gagal");
       window.location='../../index.php?halaman=vendor';
    </script>
     <?php
}


}


?>