<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $lok = $_POST['lokasi'];
  $level = $_POST['level'];
  
  
    $queri = mysqli_query($kon, "SELECT * FROM gudang WHERE nama_lokasi='$lok' and level='$level'");
    $data = mysqli_fetch_array($queri);

if(mysqli_num_rows($queri) >= 1){
    
     if($queri){
    ?>
    <script type="text/javascript">
        alert("Nama lokasi Sudah Terpakai !");
        window.location='../../index.php?halaman=lok';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("Nama Lokasi Tidak Boleh Kosong !");
        window.location='../../index.php?halaman=lok';
    </script>
     <?php
}

}else{

  $query = mysqli_query($kon, "Insert into gudang (nama_lokasi,level) VALUES ('$lok','$level');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='../../index.php?halaman=lok';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("Gagal");
        window.location='../../index.php?halaman=lok';
    </script>
     <?php
}


}
}

?>