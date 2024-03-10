<?php 
include 'koneksi.php';

if (isset($_POST['BtnSimpan'])) {
 $id_user = $_POST['id_user'];
 $link = $_POST['link'];
 $master = $_POST['master'];

$queri = mysqli_query($kon, "SELECT * FROM privileges WHERE id_user='$id_user' AND link='$link'");
$data = mysqli_fetch_array($queri);

if(mysqli_num_rows($queri)>= 1) {
    if ($queri) {
        echo "<script>
        alert('Akses Sudah Pernah Di buat');
        document.location='index.php?halaman=user';
        </script>";
        }else{
        echo "<script>
        alert('Gagal Mengecek User !');
        document.location='index.php?halaman=user';
        </script>";
        }
    }else {
    $query = mysqli_query($kon, "Insert into privileges (id_user,link,page) VALUES ('$id_user','$link','$master');");
   
    if($query){
      ?>
      <script type="text/javascript">
          alert("Berhasil");
          window.location='index.php?halaman=user';
      </script>
       <?php
  }else{
      ?>
      <script type="text/javascript">
          alert("Gagal");
          window.location='index.php?halaman=user';
      </script>
       <?php
  }
}

    }




?>