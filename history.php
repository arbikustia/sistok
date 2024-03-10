<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- CSS CDN -->
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
<!-- datetimepicker jQuery CDN -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

<main>
  <?php
   include "koneksi.php";
 
  $semuadata = [];
  $tgl_mulai = "";
  $tgl_selesai = "";

  if (isset($_POST['kirim'])) {
    $tgl_mulai = $_POST['tglm'];
    $tgl_selesai = $_POST['tgls'];

    $ambil = $kon->query("SELECT transaksi.id_transaksi,transaksi.id_user,transaksi.kode_rak,transaksi.kode_brg,master_brg.nama_brg,transaksi.stok,transaksi.asal,transaksi.tujuan,transaksi.tgl FROM transaksi LEFT JOIN master_brg ON transaksi.kode_brg=master_brg.kode_brg WHERE transaksi.tgl BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
    while ($pecah = $ambil->fetch_assoc()) {
      $semuadata[] = $pecah;
    }

  }

  ?>

  <div class="container-fluid px-4 mt-3">
    <h5 class="font-monospace fw-bold">Riwayat Barang Keluar</h5>

    <form action="" method="POST">
      <div class="row">
        <div class="col-sm-3">
          <label for="" class="form-label">Tanggal Awal</label>
          <input type="" name="tglm" placeholder="pilih tanggal awal" class="form-control tglm"
            value="<?= $tgl_mulai; ?>" id="">
        </div>
        <div class="col-sm-3">
          <label for="" class="form-label">Tanggal Akhir</label>
          <input type="" name="tgls" placeholder="pilih tanggal akhir" class="form-control tgls"
            value="<?= $tgl_selesai; ?>" id="">
        </div>
      </div>
      <button class="btn btn-primary btn-sm mt-4" name="kirim">Lihat</button>
      <button href="index.php?halaman=history" class="btn btn-warning btn-sm mt-4" name="">Refresh</button>
    </form>

    <div class="d-flex flex-row-reverse bd-highlight gap-2">
      <!--<a href="data_excel.php?&tglm=<?= $tgl_mulai ?>&tgls=<?= $tgl_selesai ?>" target="_blank" class="btn btn-outline-success btn-sm mt-2 mb-2">Excel</a>-->
      <a href="data_pdf.php?&tglm=<?= $tgl_mulai ?>&tgls=<?= $tgl_selesai ?>" target="_blank"
        class="btn btn-outline-dark btn-sm mt-2 mb-2">PDF</a>
    </div>
    <div class="table-responsive">
      <table id="myTable" class="table table-bordered" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Transaksi</th>
            <th>ID User</th>
            <th>SKU</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>NO RAK</th>
            <th>Lokasi Asal</th>
            <th>Lokasi Tujuan</th>
            <th>Tanggal</th>

          </tr>
        </thead>
        <tbody>

          <?php foreach ($semuadata as $key => $dt): ?>

            <tr>
              <td>
                <?= $key + 1 ?>.
              </td>
              <td>
                <?php echo $dt['id_transaksi']; ?>
              </td>
              <td>
                <?php echo $dt['id_user']; ?>
              </td>
              <td>
                <?php echo $dt['kode_brg']; ?>
              </td>
              <td>
                <?php echo $dt['nama_brg']; ?>
              </td>
              <td>
                <?php echo $dt['stok']; ?>
              </td>
              <td>
                <?php echo $dt['kode_rak']; ?>
              </td>
              <td>
                <?php echo $dt['asal']; ?>
              </td>
              <td>
                <?php echo $dt['tujuan']; ?>
              </td>
              <td>
                <?php echo $dt['tgl']; ?>
              </td>

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
    format: 'Y-m-d H:i',
    formatTime: 'H:i',
    formatDate: 'Y-m-d',
    step: 1
  });

  $(".tgls").datetimepicker({
    format: 'Y-m-d H:i',
    formatTime: 'H:i',
    formatDate: 'Y-m-d',
    step: 1
  });
</script>