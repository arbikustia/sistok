<?php 
include 'koneksi.php';

if(isset($_POST['BtnUbah'])){
    
    $kon = mysqli_query($kon, "UPDATE tbl_barang SET kode_rak='$_POST[rak]', stok='$_POST[stok]', varian='$_POST[varian]', status='$_POST[status]', tgl='$_POST[tgl]', catatan='$_POST[catatan]' WHERE id='$_POST[id]'");

    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='index.php?halaman=barang';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='index.php?halaman=barang';
        </script>";
        }

  }
  
  ?>