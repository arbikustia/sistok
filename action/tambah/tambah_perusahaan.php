<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $nama = $_POST['nama'];
 
  $query = mysqli_query($kon, "Insert into perusahaan (nama_perusahaan) VALUES ('$nama');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='../../index.php?halaman=perusahaan';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
       alert("Gagal");
       window.location='../../index.php?halaman=perusahaan';
    </script>
     <?php
}


}


?>