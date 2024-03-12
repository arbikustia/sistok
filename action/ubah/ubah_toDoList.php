<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnEdit'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
   
    $kon = mysqli_query($kon,"UPDATE `to_do_list` SET `status` = '$status' WHERE `to_do_list`.`id` = '$id';");
 
   
    
    if ($kon) {
        echo "<script>
        alert('Berhasil');
        document.location='../../index.php?halaman=toDoList';
        </script>";
        
        }else{
        echo "<script>
        alert('Gagal');
        document.location='../../index.php?halaman=toDoList';
        </script>";
        }
        }
        
?>