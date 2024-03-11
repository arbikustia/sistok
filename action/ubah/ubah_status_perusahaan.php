<?php 
include '../../koneksi/koneksi.php';

if (isset($_POST['BtnUpdate'])) {
    $id = $_POST['valueId'];
    $status = $_POST['valueStatus'];

    // echo $status;
    // echo $id;
$queri = mysqli_query($kon, "SELECT * FROM perusahaan WHERE status='1'");
$data = mysqli_fetch_array($queri);


    if($status == 1){
       
        $kon = mysqli_query($kon,"UPDATE `perusahaan` SET `status` = '0' WHERE `perusahaan`.`id` = '$id';");
 
    
        if ($kon) {
            echo "<script>
            alert('Berhasil');
            document.location='../../index.php?halaman=perusahaan';
            </script>";
            
            }else{
            echo "<script>
            alert('Gagal');
            document.location='../../index.php?halaman=perusahaan';
            </script>";
            }
    }else{
        if(mysqli_num_rows($queri) >= 1){ 

            echo "<script>
            alert('Mohon Non Aktif Kan Dahulu ');
            document.location='../../index.php?halaman=perusahaan';
            </script>";
        }else{

        $kon = mysqli_query($kon,"UPDATE `perusahaan` SET `status` = '1' WHERE `perusahaan`.`id` = '$id';");
    
        
        if ($kon) {
            echo "<script>
            alert('Berhasil');
            document.location='../../index.php?halaman=perusahaan';
            </script>";
            
            }else{
            echo "<script>
            alert('Gagal');
            document.location='../../index.php?halaman=perusahaan';
            </script>";
            }
        }
        }
}
        
?>