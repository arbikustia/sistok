<?php 

include 'koneksi.php';

if (isset($_POST['BtnSimpan'])) {

    $toko = $_POST['toko'];
    $brg = $_POST['brg'];
    $market = $_POST['market'];

    $count = count($market);

    for( $i = 0; $i < $count; $i++ ) {

        $query = mysqli_query($kon, "Insert into to_do_list (`id`, `id_toko`, `id_brg`, `id_market`, `status`) VALUES ('','$toko','$brg','$market[$i]','belum selesai');");
    }
 
  if($query){
    ?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location='index.php?halaman=toDoList';
    </script>
     <?php
}else{
    ?>
    <script type="text/javascript">
       alert("Gagal");
       window.location='index.php?halaman=toDoList';
    </script>
     <?php
}


}



?>