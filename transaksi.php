<main>

  <!-- jQuery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- CSS CDN -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
  <!-- datetimepicker jQuery CDN -->
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>


  <?php
  include('database_connection.php');


  function fill_unit_select_box($connect)
  {

    $output = '';

    $query = "SELECT * FROM tbl_barang order by tgl asc";

    $result = $connect->query($query);

    foreach ($result as $row) {
      $output .= '<option value="' . $row["kode_brg"] . '">' . $row["kode_brg"] . '-' . $row["nama_brg"] . '-' . $row["varian"] . '-' . $row["tgl"] . '</option>';
    }

    return $output;
  }


  ?>
  <style>
    .maxwidth {
      max-width: 400px;
    }

    .maxwidth>option {
      max-width: 500px;
      background: #000;
      color: #fff;
    }
  </style>


  <!--<h5  class="font-monospace fw-bold">Barang Keluar</h5>-->

  <?php

  $tz = 'Asia/Jakarta';
  $dt = new DateTime("now", new DateTimeZone($tz));
  $timestamp = $dt->format('Y-m-d G:i');
  // echo "$timestamp \n";
  
  ?>
  <!-- form tambah -->
  <form action="save_trans.php" target="_blank" method="POST" name="myForm" enctype="multipart/form-data">
    <?php
     include "koneksi.php";
    // Memanggil tanggal hari ini dengan format tahunbulantanggal masing-masing 2 digit contoh 190701
    $today = date('ymd');
    $char = 'TR' . $today;
    // Mencari data (id) yang paling besar (terakhir) berdasarkan hari ini dari database
    $query = mysqli_query($kon, "SELECT max(id_transaksi) as max_id FROM transaksi WHERE id_transaksi LIKE '{$char}%' ORDER BY id_transaksi DESC LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    // Sudah dapat nih gan
    $getId = $data['max_id'];
    // Oke sekarang kita ambil bagian angkanya 4 digit terakhir
    $no = substr($getId, -4, 4);
    // Contoh kodenya 'TR1910310001'
    // Setelah diambli 4 digit terakhir, hasilnya menjadi '0001'
    
    // Selanjutnya kita convert ke tipe data Integer agar bisa di Increment (ditambah)
    $no = (int) $no;
    // Ditambah 1
    $no += 1;
    /**
     * Atau bisa gunakan cara ini 
     * $no++;
     * $no = $no + 1;
     * bebas ya, silahkan pilih sesuai selera :v
     */

    // Oke next kita bakal generate kode otomatisnya
    // perintah sprintf("%04s", $no); digunakan untuk memformat string sebanyak 4 karakter
    // misal sprintf("%04s", 2); maka akan dihasilkan '0002'
    // atau misal sprintf("%04s", 1); maka akan dihasilkan string '0001'
    $newId = $char . sprintf("%04s", $no);

    // tampilkan kode otomatis
    // echo $newId;
    ?>
    <div class="row">
      <div class="col-sm-4">
        <label class="form-label" for="">No. Transaksi</label>
        <input type="text" value="<?= $newId ?>" name="No_trans" id="No_trans" class="form-control" readonly>
      </div>
      <div class="col-sm-4">
        <label class="col-form-label" for="username">Tgl Transaksi</label>
        <input type="" class="form-control tgl_trans" value="<?= $timestamp ?>" name="tgl_trans">
      </div>
      <div class="col-sm-4">
        <label class="form-label" for="">Catatan</label>
        <input type="text" name="catatan" id="" class="form-control">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <label class="form-label" for="">Lokasi Asal</label>
        <select data-dselect-search="true" name="lokasi_asal" id="dselect3" class="form-select" required>
          <option class="form-label" value="">Pilih</option>
          <?php
          include "koneksi.php";
          //query menampilkan nama unit kerja ke dalam combobox
          $query = mysqli_query($kon, "SELECT * FROM gudang where level = 'asal'");
          while ($data = mysqli_fetch_array($query)) {
            ?>
            <option value="<?= $data['nama_lokasi'] ?>">
              <?= $data['nama_lokasi'] ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="col-sm-4">
        <label class="form-label" for="">Lokasi Asal</label>
        <select data-dselect-search="true" name="lokasi_tujuan" id="dselect2" class="form-select" required>
          <option class="form-label" value="">Pilih</option>
          <?php
          include "koneksi.php";
          //query menampilkan nama unit kerja ke dalam combobox
          $query = mysqli_query($kon, "SELECT * FROM gudang where level = 'tujuan'");
          while ($data = mysqli_fetch_array($query)) {
            ?>
            <option value="<?= $data['nama_lokasi'] ?>">
              <?= $data['nama_lokasi'] ?>
            </option>
          <?php } ?>
        </select>
      </div>
    </div>



    <hr>



    <div class="card">
      <div class="card-header">Pilih Details Barang</div>
      <div class="card-body">

        <!--<form method="post" name="insert_form" id="insert_form">-->
        <div class="table-repsonsive">
          <span id="error"></span>
          <table class="table table-bordered" id="item_table">
            <thead>
              <tr>
                <th class="col-1">No</th>
                <th class="col-5">SKU</th>
                <th class="col-2">NO RAK</th>
                <th>QTY di RAK</th>
                <th>Qty Transfer</th>
                <!--<th>ID</th>-->
                <!--<th>Catatan</th>-->
                <th><button type="button" name="add" class="btn btn-dark btn-sm add"><i
                      class="fas fa-plus"></i></button></th>
              </tr>
            </thead>
            <tbody class="tb"></tbody>
          </table>
          <div align="center">
          </div>
        </div>
        <button type="submit" name="BtnCetak" class="btn btn-secondary btn-sm">Cetak Surat Jalan</button>

  </form>
  <br>
  <br>
  <a href="index.php?halaman=history" name="BtnSelesai" class="btn btn-primary btn-sm">Riwayat Transfer Barang</a>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <!--<input type="submit" name="submit" id="submit_button" class="btn btn-primary" value="Insert" />-->
    <!--<button type="submit" name="BtnSimpan" class="btn btn-primary">Simpan</button>-->
  </div>




  <script>


    function randomz(length) {
      let result = '';
      const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      const charactersLength = characters.length;
      let counter = 0;
      while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
      }
      return result;
    }


    $(document).ready(function () {

      var count = 0;
      var no = 0;

      $(document).on('click', '.add', function () {
        count++;
        no++;

        var uniquetoken = randomz(5);

        var html = '';
        html += '<tr data-token="' + uniquetoken + '">';
        html += '<td>' + no + '.</td>';
        html += '<td class="col-5"><select name="kode_brg[]" class="form-group kode_brg maxwidth" id="kode_brg" data-live-search="true" data-token="' + uniquetoken + '"><option value="">Pilih</option><?php echo fill_unit_select_box($connect); ?></select></td>';
        html += '<td class="col-2"><select class="form-select kode_rak" style="border-radius : 0; height: 35px;" data-token="' + uniquetoken + '" name="kode_rak[]" id="kode_rak"></td>';
        html += '<td><input type="text" name="item_quantity[]" id="rak" class="form-control item_quantity" readonly /></td>';
        html += '<td><input type="text" id="qty" name="qty[]" class="form-control qty" /></td>';
        html += '<td style="display: none;"><input id="idd" name="idd[]" class="form-control idd" /></td>';
        //   html += '<td><input type="text" name="catatan[]" value="-" class="form-control" /></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button></td>';
        html += '</tr>';

        $('.tb').append(html);

        VirtualSelect.init({
          ele: '.kode_brg',
          search: true
        });
      });



      $(document).on('click', '.remove', function () {
        $(this).closest('tr').remove();

      });

      $(document).on('change', '#kode_brg', function () {
        // variabel dari nilai combo box
        var parent = $(this).closest('tr');
        var kode_brg = $("#kode_brg", parent).val();
        var token = parent.data("token");
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "ambil-data.php",
          data: "kode_brg=" + kode_brg,
          success: function (data) {
            console.log(data);
            var response = JSON.parse(data);
            $(".kode_rak", parent).html(response.kode_rak);
            $(".item_quantity", parent).val(response.qty);
            $(".qty", parent).val(response.qty);
            $(".idd", parent).val(response.id);
          }
        });
      });

      $(document).on('change', '#kode_rak', function () {
        // variabel dari nilai combo box
        var parent = $(this).closest('tr');
        var kode_brg = $("#kode_brg", parent).val();
        var kode_rak = $("#kode_rak", parent).val();
        var token = parent.data("token");
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "ambil-data.php",
          data: {
            "kode_brg": kode_brg,
            "kode_rak": kode_rak
          },
          success: function (data) {
            console.log(data);
            var response = JSON.parse(data);
            $(".kode_rak", parent).html(response.kode_rak);
            $(".item_quantity", parent).val(response.qty);
            $(".qty", parent).val(response.qty);
            $(".idd", parent).val(response.id);
          }
        });
      });


    });

  </script>

  <script>
    $(".tgl_trans").datetimepicker({
      format: 'Y-m-d H:i',
      formatTime: 'H:i',
      formatDate: 'Y-m-d',
      step: 1
    });
  </script>
</main>