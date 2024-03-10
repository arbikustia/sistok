<?php 
include 'koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $foto = $_POST['foto'];
  $kode = $_POST['kode'];
  $koderak = $_POST['rak'];
  $nama = $_POST['nama'];
  $stok = $_POST['stok'];
  $tgl = $_POST['tgl'];
  $catatan = $_POST['catatan'];
  $status = $_POST['status'];
  $varian = $_POST['varian'];

 
  
  $query = mysqli_query($kon, "Insert into tbl_barang (id,kode_brg,kode_rak,nama_brg,stok,varian,foto_brg,tgl,catatan,status) VALUES ('','$kode','$koderak','$nama','$stok','$varian','$foto','$tgl','$catatan','$status');");
//   move_uploaded_file($file_tmp, 'img_brg/'.$foto);
  
  
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='index.php?halaman=input';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
        alert("Gagal");
        window.location='index.php?halaman=input';
    </script>
     <?php
}


}


?>