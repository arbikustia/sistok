 <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
    <!-- datetimepicker jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<main>
<?php
 include "koneksi.php";

$semuadata = [];
$tgl_mulai = "";
$tgl_selesai = "";
$status = $_POST[""];

if(isset($_POST['kirim'])){
  $tgl_mulai = $_POST['tglm'];
  $tgl_selesai = $_POST['tgls'];
  $status = $_POST['status'];

  $ambil = $kon->query("SELECT * FROM `tbl_barang` WHERE tgl BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status = '$status'");
  while($pecah = $ambil->fetch_assoc()){
    $semuadata[] = $pecah;
  }

}

?>

<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Riwayat Barang Masuk</h5>

<form action="" method="POST">
<div class="row">
<div class="col-sm-3">
<label for=""  class="form-label">Tanggal Awal</label>
<input type="" name="tglm" placeholder="pilih tanggal awal" class="form-control tglm" value="<?= $tgl_mulai; ?>" id="">
</div>
<div class="col-sm-3">
<label for=""  class="form-label">Pilih Akhir</label>
<input type="" name="tgls" placeholder="pilih tanggal akhir" class="form-control tgls" value="<?= $tgl_selesai; ?>" id="">
</div>
<div class="col-sm-3">
<label class="form-label">Status</label>
<select class="form-select" value="<?= $status; ?>" name="status">
    <option>selesai</option>
    <option>pending</option>
</select>

</div>
</div>
      <button class="btn btn-primary btn-sm mt-4" name="kirim">Lihat</button>
</form>

<div class="d-flex flex-row-reverse bd-highlight gap-2">
<!--<a href="data_excel.php?&tglm=<?= $tgl_mulai ?>&tgls=<?= $tgl_selesai ?>" target="_blank" class="btn btn-outline-success btn-sm mt-2 mb-2">Excel</a>-->
<a href="data_in.php?&tglm=<?= $tgl_mulai ?>&tgls=<?= $tgl_selesai ?>&stat=<?=$status ?>" target="_blank" class="btn btn-outline-dark btn-sm mt-2 mb-2">PDF</a>
</div>
        <div class="table-responsive">
                    <table id="myTable" class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>						
                                <th>No</th>
                                 <th>ID User</th>
                                <th>SKU</th>
                                <th>Nama Barang</th>
                                <th>varian</th>
                                <th>Stok</th>
                                <th>Foto</th>
                                <th>NO RAK</th>
                                <th>Tanggal</th>
                                <th>Catatan</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php foreach($semuadata as $key => $dt): ?>
                       
                        <tr>
                            <td><?= $key+1 ?>.</td>
                            <td><?php echo $dt['id_user'];?></td>
                            <td><?php echo $dt['kode_brg'];?></td>
                            <td><?php echo $dt['nama_brg'];?></td>
                            <td><?php echo $dt['varian'];?></td>
						    <td><?php echo $dt['stok'];?></td>
                            <td><?php echo $dt['foto_brg'];?></td>
                            <td><?php echo $dt['kode_rak'];?></td>
                            <td><?php echo $dt['tgl'];?></td>
                            <td><?php echo $dt['catatan'];?></td>
                            <td><?php echo $dt['status'];?></td>
                        </tr>
                       
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div>
                <div>

                </main>
                
                 <script>
                    $(".tglm").datetimepicker({
                    format : 'Y-m-d H:i',
                    formatTime : 'H:i',
                    formatDate : 'Y-m-d',
                    step: 1
                     });
                     
                     $(".tgls").datetimepicker({
                    format : 'Y-m-d H:i',
                    formatTime : 'H:i',
                    formatDate : 'Y-m-d',
                    step: 1
                     });
                    </script>