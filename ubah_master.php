<?php 
include 'koneksi.php';

if(isset($_POST['BtnUbah'])){
    
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

  
    // jika foto dirubah
    if(!empty($lokasifoto)){
      move_uploaded_file($lokasifoto, "img_brg/$namafoto");
  
      $kon = mysqli_query($kon, "UPDATE master_brg SET nama_brg='$_POST[nama]', varian='$_POST[varian]', foto_brg='$namafoto' WHERE kode_brg='$_POST[kode]'");
    }else{
        $kon = mysqli_query($kon, "UPDATE master_brg SET nama_brg='$_POST[nama]', varian='$_POST[varian]' WHERE kode_brg='$_POST[kode]'");
    }
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='index.php?halaman=master';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='index.php?halaman=master';
        </script>";
        }

  }
  
  ?>