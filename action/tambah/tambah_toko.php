<?php 
include '../../koneksi/koneksi.php';


if (isset($_POST['BtnSimpan'])) {
  $nama = $_POST['namaToko'];
 
  $query = mysqli_query($kon, "Insert into toko (nama_toko) VALUES ('$nama');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='../../index.php?halaman=toko';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
       alert("Gagal");
       window.location='../../index.php?halaman=toko';
    </script>
     <?php
}


}


?>