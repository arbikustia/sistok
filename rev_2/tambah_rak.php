<?php 
include 'koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $kode = $_POST['kode'];

  $query = mysqli_query($kon, "Insert into tb_rak (NO_RAK) VALUES ('$kode');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='index.php?halaman=rak';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("Gagal");
        window.location='index.php?halaman=rak';
    </script>
     <?php
}


}


?>