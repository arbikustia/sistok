<?php 
include('koneksi.php');
session_start();
require 'vn/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['btnImport'])) {
    $allowed_ext = ['xls', 'csv', 'xlsx'];
    $filename = $_FILES['import_file']['name'];
    $checking = explode(".", $filename);
    $file_ext = end($checking);

    if (in_array($file_ext, $allowed_ext)) 
       {

        $targetPath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $row) 
        {

        $kode_brg = $row[0];
        $kode_rak = $row[1];
        $nama_brg = $row[2];
        $stok = $row[3];
        $varian = $row[4];
        $tgl = $row[5]; 
        $catatan = $row[6];
        $status = $row[7];

        
        // //cekData
        $cekKodeBrg = "SELECT kode_brg from tbl_barang where kode_brg='$kode_brg'";
        $result = mysqli_query($kon, $cekKodeBrg);
        //Jika data sudah ada
        if (mysqli_num_rows($result) >= 1) {
            $updateBrg = "UPDATE tbl_barang SET id_user='$_SESSION[id]', kode_rak='$kode_rak', nama_brg='$nama_brg', stok='$stok', varian='$varian', tgl='$tgl', catatan='$catatan', status='$status' WHERE kode_brg='$kode_brg'";
            $up_result = mysqli_query($kon, $updateBrg);
        }
        else
        {
            //jika belum
            $insert = "INSERT INTO tbl_barang (`id_user`, `kode_brg`, `kode_rak`, `nama_brg`, `stok`, `varian`, `tgl`, `catatan`, `status`) VALUES ('$_SESSION[id]','$kode_brg','$kode_rak','$nama_brg','$stok','$varian','$tgl','$catatan','$status')";
            $in_result=mysqli_query($kon, $insert);

        }
        
       // header("location: index.php?halaman=barang");
    }
    
    }else{
            // header("location: index.php?halaman=barang");
            // exit(0);
        
    }

}


?>