<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- CSS CDN -->
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
<!-- datetimepicker jQuery CDN -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>


<main>
  <div class="container-fluid px-4 mt-3">
    <h5 class="font-monospace fw-bold">Tambah Data Barang</h5>

    <form action="" method="POST" enctype="multipart/form-data">
      <label class="form-label" for="">SKU</label>
      <div class="col-sm-4">
        <input type="text" name="id" placeholder="Enter" class="form-control-sm">
        <button class="btn btn-primary btn-sm" name="cari" type="submit" id="button-addon2">Cari Barang</button>
      </div>
    </form>

    <?php
     include "koneksi.php";

    if (isset($_POST['cari'])) {
      $id = $_POST['id'];

      $query = "SELECT * FROM master_brg where kode_brg='$id'";
      $query_run = mysqli_query($kon, $query);

      if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
          ?>
          <form action="addbrg.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-4">
                <label class="form-label" for="username">SKU</label>
                <input type="text" value="<?= $row['kode_brg'] ?>" class="form-control" name="kode" readonly>
              </div>
              <div class="col-sm-4">
                <label class="form-label" for="username">Nama Barang</label>
                <input type="text" value="<?= $row['nama_brg'] ?>" class="form-control" name="nama" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label for="Image" class="form-label">Foto</label>
                <input class="form-control" type="text" value="<?= $row['foto_brg'] ?>" name="foto" readonly>
              </div>
              <div class="col-sm-4">
                <label class="col-form-label col-form-label-sm">Varian</label>
                <input type="text" class="form-control" value="<?= $row['varian'] ?>" name="varian">
              </div>

            </div>
            <div class="row">
              <div class="col-sm-4">
                <label class="col-form-label col-form-label-sm">Status</label>
                <select class="form-select" name="status">
                  <option>selesai</option>
                  <option>pending</option>
                </select>
              </div>
              <div class="col-sm-4">
                <label for="" class="form-label">Stok</label>
                <input class="form-control" type="number" name="stok">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label class="col-form-label col-form-label-sm" for="username">Tanggal</label>
                <input type="" class="form-control tgl" name="tgl">
              </div>

              <div class="col-sm-4">
                <label class="form-label" for="">NO RAK</label>
                <select data-dselect-search="true" name="rak" id="dselect3" class="form-select">
                  <option value="">Pilih Rak</option>
                  <?php
                  include "koneksi.php";
                  //query menampilkan nama unit kerja ke dalam combobox
                  $query = mysqli_query($kon, "SELECT * FROM tb_rak");
                  while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?= $data['NO_RAK'] ?>">
                      <?= $data['NO_RAK'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-8">
              <label class="col-form-label col-form-label-sm">Catatan</label>
              <input type="text" class="form-control" name="catatan">
            </div>




            <button type="submit" name="BtnSimpan" class="btn btn-primary btn-sm mt-3">Tambah Data</button>
          </form>


          <?php
        }
      } else {
        echo "Barang Tidak Ditemukan !";
      }
    }
    ?>

  </div>
</main>
</script>

<script>
  $(".tgl").datetimepicker({
    format: 'Y-m-d H:i',
    formatTime: 'H:i',
    formatDate: 'Y-m-d',
    step: 1
  });
</script>