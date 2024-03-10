<?php 
include 'koneksi.php';

if (isset($_POST['BtnSimpan'])) {
  $foto = $_POST['foto'];
  $kode = $_POST['kode'];
  $koderak = $_POST['rak'];
  $nama = $_POST['nama'];
  $satuan = $_POST['satuan'];
  $stok = $_POST['stok'];
  $tgl = $_POST['tgl'];
  $catatan = $_POST['catatan'];

 
  
  $query = mysqli_query($kon, "Insert into tbl_barang (id,kode_brg,kode_rak,nama_brg,satuan,stok,foto_brg,tgl,catatan) VALUES ('','$kode','$koderak','$nama','$satuan','$stok','$foto','$tgl','$catatan');");
//   move_uploaded_file($file_tmp, 'img_brg/'.$foto);
  
  
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
        window.location='index.php?halaman=barang';
    </script>
     <?php
}


}


?>