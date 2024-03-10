<?php 
include 'koneksi.php';
session_start();

if (isset($_POST['BtnSimpan'])) {
  $foto = $_FILES['foto']['name'];
  $file_tmp = $_FILES['foto']['tmp_name'];
  $kode = $_POST['kode'];
  $koderak = $_POST['rak'];
  $nama = $_POST['nama'];
  $stok = $_POST['stok'];
  $maxstok = $_POST['maxStok'];
  $varian = $_POST['varian'];
  $tgl = $_POST['tgl'];
  $catatan = $_POST['catatan'];
  $status = $_POST['status'];
  
    $queri = mysqli_query($kon, "SELECT * FROM master_brg WHERE kode_brg='$kode'");
    $data = mysqli_fetch_array($queri);

if(mysqli_num_rows($queri) >= 1){
    
     if($queri){
    ?>
    <script type="text/javascript">
        alert("Kode Barang Sudah Terpakai !");
        window.location='index.php?halaman=barang_baru';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("kode brg Tidak Boleh Kosong !");
        window.location='index.php?halaman=barang_baru';
    </script>
     <?php
}
}else{
  
    
  $query = mysqli_query($kon, "INSERT INTO `tbl_barang`(`id`, `id_user`, `kode_brg`, `kode_rak`, `nama_brg`, `stok`, `varian`, `foto_brg`, `tgl`, `catatan`, `status`) VALUES ('','$_SESSION[id]','$kode','$koderak','$nama','$stok','$varian','$foto','$tgl','$catatan','$status');");
  move_uploaded_file($file_tmp, 'img_brg/'.$foto); 
  
  $query = mysqli_query($kon,"Insert into master_brg (kode_brg,nama_brg,varian,foto_brg) VALUES ('$kode','$nama','$varian','$foto');");
  
  if (!empty($_POST["maxStok"])) {
    
  $query = mysqli_query($kon,"Insert into notif (kode_brg,max_stok) VALUES ('$kode','$maxstok');");
  
    
}
  
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='index.php?halaman=barang';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("Gagal");
        window.location='index.php?halaman=barang_baru';
    </script>
     <?php
}

}








}


?>