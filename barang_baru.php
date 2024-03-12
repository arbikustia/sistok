     <!-- jQuery CDN -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <!-- CSS CDN -->
     <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
     <!-- datetimepicker jQuery CDN -->
     <script
         src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
     </script>


     <main>
         <div class="container-fluid px-4 mt-3">

             <h5>Tambah Data Barang</h5>

             <form action="tambah_brg.php" name="myForm" method="POST" enctype="multipart/form-data">
                 <div class="row">
                     <div class="col">
                         <label class="col-form-label col-form-label-sm" for="username">SKU</label>
                         <input type="text" class="form-control" name="kode" required>
                     </div>
                     <div class="col">
                         <label class="col-form-label col-form-label-sm">NO RAK</label>
                         <select data-dselect-search="true" name="rak" id="dselect3" class="form-select" required>
                             <option value="">Pilih Rak</option>
                             <?php  
                            include "koneksi.php";
                            //query menampilkan nama unit kerja ke dalam combobox
                            $query = mysqli_query($kon, "SELECT * FROM tb_rak");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                             <option value="<?= $row['NO_RAK'] ?>"><?= $row['NO_RAK']?></option>
                             <?php } ?>
                         </select>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col">
                         <label class="col-form-label col-form-label-sm" for="username">Nama Barang</label>
                         <input type="text" class="form-control" name="nama" required>
                     </div>
                     <div class="col-sm-2">
                         <label class="col-form-label col-form-label-sm" for="username">Stok</label>
                         <input type="number" class="form-control" name="stok">
                     </div>
                     <div class="col-sm-2">
                         <label class="col-form-label col-form-label-sm" for="username">Max Stok</label>
                         <input type="number" class="form-control" name="maxStok">
                     </div>
                     <div class="col-sm-2">
                         <label class="col-form-label col-form-label-sm" for="username">Varian</label>
                         <input type="text" class="form-control" value="<?= $row['varian']?>" name="varian">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col">
                         <label class="col-form-label col-form-label-sm" for="username">Status</label>
                         <select class="form-select" name="status">
                             <option value="selesai">selesai</option>
                             <option value="pending">pending</option>
                         </select>
                     </div>
                     <div class="col">
                         <label for="Image" class="form-label">Foto</label>
                         <input class="form-control" type="file" name="foto">
                     </div>
                 </div>
                 <div class="row">
                     <div class="col">
                         <label class="col-form-label col-form-label-sm" for="username">Tanggal</label>
                         <input type="" class="form-control tgl" name="tgl">
                     </div>
                     <div class="col">
                         <label class="col-form-label col-form-label-sm" for="username">catatan</label>
                         <input type="text" class="form-control" name="catatan">
                     </div>
                 </div>
         </div>
         <div class="px-4">

             <button type="submit" name="BtnSimpan" class="btn btn-success mt-2">Tambah</button>

             </form>
         </div>

     </main>
      <script>
  $(".tgl").datetimepicker({
      format: 'Y-m-d H:i',
      formatTime: 'H:i',
      formatDate: 'Y-m-d',
      step: 1
  });
      </script>