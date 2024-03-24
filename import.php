<?php
include 'koneksi.php';
session_start();
require 'vn/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['btnImport'])) {
    $allowed_ext = ['xls', 'csv', 'xlsx'];
    $filename = $_FILES['import_file']['name'];
    $checking = explode('.', $filename);
    $file_ext = end($checking);

    if (in_array($file_ext, $allowed_ext)) {
        $targetPath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $insertFlag = true; // Set flag insert menjadi true

        for ($i = 1; $i < count($data); $i++) {
            $kode_brg = $data[$i]['0'];
            $nama_brg = $data[$i]['1'];
            $varian = $data[$i]['2'];
            $stok = $data[$i]['3'];
            $kode_rak = $data[$i]['4'];
            $tgl = $data[$i]['5'];
            $catatan = $data[$i]['6'];
            $status = $data[$i]['7'];

            $cekBrg = "SELECT kode_brg, nama_brg, varian FROM master_brg WHERE kode_brg='$kode_brg'";
            $kueri = mysqli_query($kon, $cekBrg);
            $dt = mysqli_fetch_array($kueri);

            if ($dt['kode_brg'] != $kode_brg || $dt['nama_brg'] != $nama_brg) {
                echo "<script>
                alert('Data barang dengan kode $kode_brg dan nama $nama_brg tidak ditemukan. Mohon cek kembali!');
                document.location='index.php?halaman=barang';
                </script>";

                $insertFlag = false; // Set flag insert menjadi false karena ada barang yang tidak ditemukan
                break; // Keluar dari loop jika ada barang yang tidak ditemukan
            }
        }

        // Lakukan insert hanya jika tidak ada barang yang tidak ditemukan
        if ($insertFlag) {
            // Proses insert barang ke dalam tabel
            for ($i = 1; $i < count($data); $i++) {
                // Kode untuk insert barang ke dalam tabel
                $kode_brg = $data[$i]['0'];
                $nama_brg = $data[$i]['1'];
                $varian = $data[$i]['2'];
                $stok = $data[$i]['3'];
                $kode_rak = $data[$i]['4'];
                $tgl = $data[$i]['5'];
                $catatan = $data[$i]['6'];
                $status = $data[$i]['7'];

                $cekKodeBrg = "SELECT kode_brg, stok, varian FROM tbl_barang WHERE kode_brg='$kode_brg'";
                $result = mysqli_query($kon, $cekKodeBrg);
                $row = mysqli_fetch_array($result);
                $stokAwal = $row['stok'] + $stok;
                $varians = $dt['varian'];

                //Jika data sudah ada
                if (mysqli_num_rows($result) >= 1) {
                    $updateBrg = "UPDATE tbl_barang SET id_user='$_SESSION[id]', kode_rak='$kode_rak', nama_brg='$nama_brg', stok='$stokAwal', varian='$varian', tgl='$tgl', catatan='$catatan', status='$status' WHERE kode_brg='$kode_brg'";
                    $up_result = mysqli_query($kon, $updateBrg);
                } else {
                    $insert = "INSERT INTO tbl_barang (`id_user`, `kode_brg`, `kode_rak`, `nama_brg`, `stok`, `varian`, `tgl`, `catatan`, `status`) VALUES ('$_SESSION[id]','$kode_brg','$kode_rak','$nama_brg','$stok','$varian','$tgl','$catatan','$status')";
                    $in_result = mysqli_query($kon, $insert);
                }
            }

            // Redirect setelah selesai proses insert
            header('location: index.php?halaman=barang');
        }
    } else {
        echo "<script>
                alert('Ekstensi file tidak valid. Hanya file dengan ekstensi xls, csv, atau xlsx yang diperbolehkan!');
                document.location='index.php?halaman=barang';
                </script>";
    }
}
?>
