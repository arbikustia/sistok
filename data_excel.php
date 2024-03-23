<?php
include('koneksi.php');
require 'vn/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
 
// $sheet->setCellValue('A1', 'No');
$sheet->setCellValue('A1', 'SKU');
$sheet->setCellValue('B1', 'Nama Barang');
$sheet->setCellValue('C1', 'Varian');
$sheet->setCellValue('D1', 'Stok');
$sheet->setCellValue('E1', 'NO RAK');
$sheet->setCellValue('F1', 'Tanggal Masuk');
$sheet->setCellValue('G1', 'Catatan');
$sheet->setCellValue('H1', 'Status');
 

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Barang_Masuk.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();
$writer->save('php://output');
?>