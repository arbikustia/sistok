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
$sheet->setCellValue('D1', 'Foto');
$sheet->setCellValue('E1', 'Stok');
$sheet->setCellValue('F1', 'NO RAK');
$sheet->setCellValue('G1', 'Tanggal');
$sheet->setCellValue('H1', 'Catatan');
$sheet->setCellValue('I1', 'Status');
 

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Template.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();
$writer->save('php://output');
?>