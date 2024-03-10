<?php 
include 'koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $kode = $_POST['id'];
  $nama = $_POST['nama'];
  $pass = $_POST['pass'];
  $level = $_POST['level'];

  $query = mysqli_query($kon, "Insert into user (id,username,password,level) VALUES ('$kode','$nama','$pass','$level');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='index.php?halaman=user';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("Gagal");
        window.location='index.php?halaman=user';
    </script>
     <?php
}


}


?>