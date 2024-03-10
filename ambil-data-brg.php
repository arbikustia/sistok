<?php
include "koneksi.php";
$response = array();

if(!isset($_POST['kode_rak'])) {
    if (isset($_POST['kode_brg']) && $_POST['kode_brg'] != "") {
        $kode_brg = $_POST["kode_brg"];
        $sql = "SELECT id,kode_rak, stok FROM tbl_barang WHERE kode_brg='$kode_brg' ORDER BY kode_rak ASC";
        $hasil = mysqli_query($kon, $sql);
        if(mysqli_num_rows($hasil) > 0) {
            $koderak = "";
            $i = 0;
            while($data = mysqli_fetch_array($hasil)) {
                if($i == 0) {
                    $response['id'] = $data['id'];
                    $response['qty'] = $data['stok'];
                }
                $koderak = $koderak.'<option value="'.$data['kode_rak'].'">'.$data['kode_rak'].'</option>';
                $i++;
            }
            $response['kode_rak'] = $koderak;
        }
        $response['row'] = mysqli_num_rows($hasil);
    }    
} else {
    $kode_brg = $_POST["kode_brg"];
    $kode_rak = $_POST['kode_rak'];
    $sql = "SELECT id, stok FROM tbl_barang WHERE kode_brg='$kode_brg' AND kode_rak='$kode_rak'";
    $hasil = mysqli_query($kon, $sql);
    if(mysqli_num_rows($hasil) == 1) {
        $data = mysqli_fetch_array($hasil);
        $response['id'] = $data['id'];
        $response['qty'] = $data['stok'];
    }
}

echo json_encode($response);
?>