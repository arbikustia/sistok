<?php 
include 'koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $kode = $_POST['kode'];
  $stokk = $_POST['stokk'];
  
  
    $queri = mysqli_query($kon, "SELECT * FROM notif WHERE kode_brg='$kode'");
    $data = mysqli_fetch_array($queri);

if(mysqli_num_rows($queri) >= 1){
    
     if($queri){
    ?>
    <script type="text/javascript">
        alert("SKU Sudah Ada !");
        window.location='index.php?halaman=add_notif';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("SKU Tidak Boleh Kosong !");
        window.location='index.php?halaman=add_notif';
    </script>
     <?php
}

}else{

  $query = mysqli_query($kon, "Insert into notif (kode_brg,max_stok) VALUES ('$kode','$stokk');");
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='index.php?halaman=add_notif';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("Gagal");
        window.location='index.php?halaman=add_notif';
    </script>
     <?php
}


}
}

?>