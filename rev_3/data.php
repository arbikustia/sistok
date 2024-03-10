<?php
include('koneksi.php');
require 'vn/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
 
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Kode Barang');
$sheet->setCellValue('C1', 'Kode Rak');
$sheet->setCellValue('D1', 'Nama Barang');
$sheet->setCellValue('E1', 'Satuan');
$sheet->setCellValue('F1', 'Stok');
$sheet->setCellValue('G1', 'Foto');
$sheet->setCellValue('H1', 'Tanggal');
$sheet->setCellValue('I1', 'Catatan');
$sheet->setCellValue('J1', 'Status');
 
$data = mysqli_query($kon,"select * from tbl_barang");
$i = 2;
$no = 1;
while($d = mysqli_fetch_array($data))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $d['kode_brg']);
    $sheet->setCellValue('C'.$i, $d['kode_rak']);
    $sheet->setCellValue('D'.$i, $d['nama_brg']);
    $sheet->setCellValue('E'.$i, $d['satuan']);    
    $sheet->setCellValue('F'.$i, $d['stok']);    
    $sheet->setCellValue('G'.$i, $d['foto_brg']); 
    $sheet->setCellValue('H'.$i, $d['tgl']); 
    $sheet->setCellValue('I'.$i, $d['catatan']); 
    $sheet->setCellValue('J'.$i, $d['status']); 
    $i++;
}
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="DataBarang.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();
$writer->save('php://output');
?>