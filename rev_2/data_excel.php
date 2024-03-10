<?php
ob_start(); 
$tgl_mulai = $_GET['tglm'];
$tgl_selesai = $_GET['tgls'];
//Menggabungkan dengan file koneksi yang telah kita buat
include 'koneksi.php';


// Load library phpspreadsheet
require('vn/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

$spreadsheet = new Spreadsheet();


$spreadsheet->getActiveSheet()->mergeCells('A1:G1');
$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Transaksi Periode');
$spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', $tgl_mulai);
$spreadsheet->setActiveSheetIndex(0)->setCellValue('B2', $tgl_selesai);


//Font Color
$spreadsheet->getActiveSheet()->getStyle('A3:H3')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

// Background color
    $spreadsheet->getActiveSheet()->getStyle('A3:H3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFF1111');


// Header Tabel
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A3', 'No')
->setCellValue('B3', 'ID User')
->setCellValue('C3', 'Kode Rak')
->setCellValue('D3', 'Kode Barang')
->setCellValue('E3', 'Nama Barang')
->setCellValue('F3', 'Jumlah')
->setCellValue('G3', 'Tujuan')
->setCellValue('H3', 'Tanggal Transaksi')
;



$i=4; 
$no=1; 
$query ="SELECT id_user,id_brg,tbl_rak.kode_rak,riwayat.kode_brg,nama_brg,riwayat.stok,riwayat.tujuan,riwayat.tgl FROM riwayat LEFT JOIN tbl_barang ON riwayat.id_brg=tbl_barang.id LEFT JOIN tbl_rak ON riwayat.kode_rak=tbl_rak.kode_rak WHERE riwayat.tgl BETWEEN '$tgl_mulai' AND '$tgl_selesai'";                                                     
$koneksi = $kon->prepare($query);
$koneksi->execute();
$res1 = $dewan1->get_result();
while ($row = $res1->fetch_assoc()) {
	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A'.$i, $no)
	->setCellValue('B'.$i, $row['id_user'])
    ->setCellValue('C'.$i, $row['kode_rak'])
	->setCellValue('D'.$i, $row['kode_brg'])
	->setCellValue('E'.$i, $row['nama_brg'])
	->setCellValue('F'.$i, $row['stok'])
    ->setCellValue('G'.$i, $row['tujuan'])
    ->setCellValue('H'.$i, $row['tgl']);
	$i++; $no++;
}


// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Lap Transaksi.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
ob_end_clean();
$writer->save('php://output');

?>