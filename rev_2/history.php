<main>
<?php

$koneksi = new mysqli("localhost", "sistokmy_rott", "@Adeputri99", "sistokmy_sistok");
$semuadata = [];
$tgl_mulai = "-";
$tgl_selesai = "-";

if(isset($_POST['kirim'])){
  $tgl_mulai = $_POST['tglm'];
  $tgl_selesai = $_POST['tgls'];

  $ambil = $koneksi->query("SELECT riwayat.id_user,riwayat.kode_rak,riwayat.kode_brg,master_brg.nama_brg,riwayat.stok,riwayat.tujuan,riwayat.tgl FROM riwayat LEFT JOIN master_brg ON riwayat.kode_brg=master_brg.kode_brg WHERE riwayat.tgl BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
  while($pecah = $ambil->fetch_assoc()){
    $semuadata[] = $pecah;
  }

}

?>

<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">History Transaksi</h5>

<form action="" method="POST">
<div class="row">
<div class="col-sm-3">
<label for=""  class="form-label">Tanggal Awal</label>
<input type="datetime-local" name="tglm" class="form-control" value="<?= $tgl_mulai; ?>" id="">
</div>
<div class="col-sm-3">
<label for=""  class="form-label">Pilih Akhir</label>
<input type="datetime-local" name="tgls" class="form-control" value="<?= $tgl_selesai; ?>" id="">
</div>
</div>
      <button class="btn btn-primary btn-sm mt-4" name="kirim">Lihat</button>
</form>

<div class="d-flex flex-row-reverse bd-highlight gap-2">
<!--<a href="data_excel.php?&tglm=<?= $tgl_mulai ?>&tgls=<?= $tgl_selesai ?>" target="_blank" class="btn btn-outline-success btn-sm mt-2 mb-2">Excel</a>-->
<a href="data_pdf.php?&tglm=<?= $tgl_mulai ?>&tgls=<?= $tgl_selesai ?>" target="_blank" class="btn btn-outline-dark btn-sm mt-2 mb-2">PDF</a>
</div>
        <div class="table-responsive">
                    <table id="myTable" class="table table-bordered" cellspacing="0">
                        <thead>
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
                        </thead>
                        <tbody>
                        
                        <?php foreach($semuadata as $key => $dt): ?>
                       
                        <tr>
                            <td><?= $key+1 ?>.</td>
                            <td><?php echo $dt['id_user'];?></td>
                            <td><?php echo $dt['kode_rak'];?></td>
                            <td><?php echo $dt['kode_brg'];?></td>
                            <td><?php echo $dt['nama_brg'];?></td>
						    <td><?php echo $dt['stok'];?></td>
                            <td><?php echo $dt['tujuan'];?></td>
                            <td><?php echo $dt['tgl'];?></td>

                        </tr>
                       
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div>
                <div>

                </main>