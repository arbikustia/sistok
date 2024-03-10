<?php

ob_start(); 
$tgl_mulai = $_GET['tglm'];
$tgl_selesai = $_GET['tgls'];
?>
<html>
<head>
  <title>Cetak PDF</title>

  <style>
    .tbl{
     width: 700pt;
     border: 1px solid #000;
     font-size: 13px;
     text-align: center;
    } 
</style>
   
</head>
<body>
  
<h3 style="text-align: center;">Data History Transaksi</h3>
<h4>Laporan Transaksi Dari Tanggal <?= $tgl_mulai; ?> hingga <?= $tgl_selesai; ?></h4>
<table align="center" id="tbl" class="tbl" border="1" width="100px">
<tr>
<th>No</th> 
<th>ID User</th>
<th>Kode RAK</th>
<th>Kode Barang</th>
<th>Nama Barang</th>
<th>Jumlah</th>
<th>Tujuan</th>
<th>Tanggal</th>                       
</tr>
<?php
// Load file koneksi.php
include "koneksi.php";
$query ="SELECT riwayat.id_user,riwayat.kode_rak,riwayat.kode_brg,master_brg.nama_brg,riwayat.stok,riwayat.tujuan,riwayat.tgl FROM riwayat LEFT JOIN master_brg ON riwayat.kode_brg=master_brg.kode_brg WHERE riwayat.tgl BETWEEN '$tgl_mulai' AND '$tgl_selesai'";                                                     
$sql = mysqli_query($kon, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
$no = 1;
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$data['id_user']."</td>";
        echo "<td>".$data['kode_rak']."</td>";
        echo "<td>".$data['kode_brg']."</td>";
        echo "<td>".$data['nama_brg']."</td>";
        echo "<td>".$data['stok']."</td>";
        echo "<td>".$data['tujuan']."</td>";
        echo "<td>".$data['tgl']."</td>";
        echo "</tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require 'html2pdf/autoload.php';
$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data_History.pdf', 'D');
?>