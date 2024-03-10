<?php 
include 'koneksi.php';

if (isset($_POST['BtnEdit'])) {
    
    $pass =$_POST['pass'];
    $passnew =$_POST['password'];
    $id =$_POST['id'];

    $queri = mysqli_query($kon, "SELECT * FROM user WHERE id='$id' AND password='$pass'");
    $data = mysqli_fetch_array($queri);

if(mysqli_num_rows($queri) >= 1){
    
    $kon = mysqli_query($kon, "UPDATE user SET password ='$_POST[password]' WHERE id='$_POST[id]'");
    
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='index.php';
        </script>";
        }else{
        echo "<script>
        alert('Gagal');
        document.location='index.php?halaman=password';
        </script>";
        }
    }else{
        ?>
        <script type="text/javascript">
            alert("Password Lama Salah !");
            window.location='index.php?halaman=password';
        </script>
         <?php

    }
}
?>