<style>
  .modal-body{
    width: 100%;
  }
</style>

<main>
  <?php
  include "koneksi.php";

  $semuadata = [];
  $cari = "";
  $filter_tgl = "";


  if (isset($_POST['submit'])) {
    $cari = $_POST['cari'];
    $filter_tgl = $_POST['filter_tgl'];

    $ambil = $kon->query("SELECT * FROM tbl_barang WHERE kode_brg like '%" . $cari . "%' OR nama_brg like '%" . $cari . "%' order by tgl $filter_tgl ");
    while ($pecah = $ambil->fetch_assoc()) {
      $semuadata[] = $pecah;
    }

  }

  ?>


  <div class="container-fluid px-4 mt-3">
    <h5 class="font-monospace fw-bold">Pencarian Komplain</h5>
    <!--<button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>-->

    <form action="" method="post">
      <label class="mt-2" for="">Cari Barang Berdasarkan No Pesanan / No Resi / Nama Pembeli</label>
      <div class="row">
        <div class="col-sm-2">
          <input type="text" name="cari" placeholder="Enter" class="form-control sm" value="<?= $cari; ?>"
            class="form-control" />
        </div>
        <div class="col-sm-2">
          <select name="filter_tgl" class="form-select sm">
            <option value="desc" <?php if ($filter_tgl == "desc") {
              echo "selected";
            } ?>>Tanggal Terbaru</option>
            <option value="asc" <?php if ($filter_tgl == "asc") {
              echo "selected";
            } ?>>Tanggal Terlama</option>
          </select>
        </div>
        <div class="col">
          <button class="btn btn-outline-dark" name="submit" type="submit">Cari</button>
          <button href="index.php?halaman=cari_barang" class="btn btn-warning">Refresh</button>
        </div>
      </div>
    </form>
  </div>

  <div class="modal-body col-md-8 px-4 mt-3">
    <div class="table-responsive">
      <table id="tbCari" class="table table-bordered" cellspacing="1">
        <thead>
          <tr>
            <th>No</th>
            <th>SKU</th>
            <th>Nama Barang</th>
            <th>Varian</th>
            <th>Stok</th>
            <th>NO RAK</th>
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
                <?php echo $dt['kode_brg']; ?>
              </td>
              <td>
                <?php echo $dt['nama_brg']; ?>
              </td>
              <td>
                <?php echo $dt['varian']; ?>
              </td>
              <td>
                <?php echo $dt['stok']; ?>
              </td>
              <td>
                <?php echo $dt['kode_rak']; ?>
              </td>
              <td>
                <?php echo $dt['tgl']; ?>
              </td>
            </tr>

            <?php
          endforeach;
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <div>

</main>