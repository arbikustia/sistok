<?php
include 'koneksi.php';
$noTransaksi = $_GET['no_trans'];

$ambil = $kon->query("SELECT * FROM transaksi where id_transaksi = '$noTransaksi'");
$pecah = $ambil->fetch_assoc();

require_once 'vendor/vn/autoload.php';
$mpdf = new \Mpdf\Mpdf();


?>
<style>
    .tbl{
     width: 700pt;
     border: 1px solid #000;
     font-size: 16px;
     text-align: center;
     
    
    }
</style>
                    <h5>No Transaksi : <?=$pecah['id_transaksi']?></h5> 
                    <h5>Tgl Transaksi : <?=$pecah['tgl']?></h5> 
                    <h5>Lokasi Asal : <?=$pecah['asal']?></h5>
                    <h5>Lokasi Tujuan : <?=$pecah['tujuan']?></h5>
                    <h5>Catatan : <?=$pecah['catatan']?></h5>
                    <table align="center" id="tbl" class="tbl" border="0" width="100px">
                            <tr>						
                                <th>No</th> 
                                <th>Kode barang</th>
                                <th>Nama Barang</th>
                                <th>Kode RAK</th>
                                <th>Qty</th>
                                
                            </tr>
                        <?php
                        $no = 1;
                        include 'koneksi.php';
                        $data = mysqli_query($kon, "SELECT * FROM transaksi LEFT JOIN master_brg ON transaksi.kode_brg=master_brg.kode_brg WHERE id_transaksi='$noTransaksi'");
                        while($dt = mysqli_fetch_array($data)){
                        ?>
                           <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?php echo $dt['kode_brg'];?></td>
                                <td><?php echo $dt['nama_brg'];?></td>
                                <td><?php echo $dt['kode_rak'];?></td>
                                <td><?php echo $dt['stok'];?></td>
                              
                        </tr>
                        <?php } ?>
                    </table>
              

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_decode($html));
$mpdf->Output("surat_jalan.pdf", "I");
 ?>