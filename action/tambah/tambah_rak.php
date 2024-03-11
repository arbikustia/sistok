<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $kode = $_POST['kode'];
  
  
    $queri = mysqli_query($kon, "SELECT * FROM tb_rak WHERE NO_RAK='$kode'");
    $data = mysqli_fetch_array($queri);

if(mysqli_num_rows($queri) >= 1){
    
     if($queri){
    ?>
    <script type="text/javascript">
        alert("NO RAK Sudah Terpakai !");
        window.location='index.php?halaman=rak';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("NO RAK Tidak Boleh Kosong !");
        window.location='index.php?halaman=rak';
    </script>
     <?php
}

}else{

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
}

?>