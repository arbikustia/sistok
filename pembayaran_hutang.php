     <!-- jQuery CDN -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <!-- CSS CDN -->
     <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
     <!-- datetimepicker jQuery CDN -->
     <script
         src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
     </script>



     <style>
.modal-body {
    width: 100%;
    /* height: fit-content; */
    /* display: flex; */
    /* flex-direction: column; */
    /* gap: 3rem; */
    /* background-color: red; */
}

.modal-body form {
    display: flex;
    flex-direction: column;
    gap: .5rem;
}

.notif {
    cursor: pointer;
}

.tgl {
    background-color: transparent;
}


.quesadilla {
    position: relative;
}

.quesadilla input[type="date"] {
    padding-right: 30px;
    /* Adjust padding to accommodate the custom icon */
}

#customDateIcon {
    position: absolute;
    top: 50%;
    right: 10px;
    /* Adjust the position of the custom icon */
    transform: translateY(-50%);
    cursor: pointer;
    z-index: 1;
    /* Ensure the custom icon is above the input */
}

.enchilada::-webkit-calendar-picker-indicator {
    display: none;
    /* Hide the default calendar icon */
}
     </style>
     <main>
         <div class="container-fluid px-4 mt-3">
             <h5 class="font-monospace fw-bold">Tambah Pembayaran</h5>
             <!-- <a class="btn btn-primary btn-sm" href="index.php?halaman=add_notif">Tambah</a> -->
             <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah">Tambah</button>
             <div class="modal fade" id="modalUbah" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                 aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <form>
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Tanggal</label>
                                     <input type="date" class="form-control" id="exampleInputEmail1"
                                         aria-describedby="emailHelp" placeholder="Tanggal">
                                 </div>
                                 <div class="form-group">
                                     <label class="col-form-label col-form-label-sm" for="username">Vendor</label>
                                     <select type="text" value="" class="form-select" name="level">
                                         <option value="Admin">Vendor 1</option>
                                         <option value="Pegawai">Vendor 2</option>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Tanggal</label>
                                     <input type="date" min="2" max="2" class="form-control" id="exampleInputPassword1"
                                         placeholder="Tanggal">
                                 </div>
                                 <div class="form-group">
                                     <label class="notif" for="tgl">Notification <i
                                             class="fa-solid fa-bell"></i></label>
                                     <input type="" class="tgl form-control " id="tgl" name="tgl">
                                     <div class="hasil"></div>
                                 </div>
                                 <div class="modal-footer mt-2">
                                     <button type="button" class="btn btn-secondary"
                                         data-bs-dismiss="modal">Batal</button>
                                     <!-- <button type="submit" name="BtnEdit" class="btn btn-danger">Tambah</button> -->
                                     <button type="submit" class="btn btn-primary">Submit</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>


             <!-- Modal Tambah -->
             <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                 aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <form action="tambah_notif.php" method="post">
                                 <div class="col">
                                     <label class="form-label" for="">SKU</label>
                                     <select data-dselect-search="true" name="kode" id="dselect3" class="form-select">
                                         <option value="">Pilih</option>
                                         <?php  
                              include "koneksi.php";
                              //query menampilkan nama unit kerja ke dalam combobox
                              $query = mysqli_query($kon, "SELECT kode_brg FROM master_brg");
                              while ($data = mysqli_fetch_array($query)) {
                              ?>
                                         <option value="<?= $data['kode_brg'] ?>"><?= $data['kode_brg']?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                                 <div class="col">
                                     <label class="col-form-label col-form-label-sm" for="username">Peringatan
                                         Stok</label>
                                     <input type="text" class="form-control" name="stokk" disabled>
                                 </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                             <button type="submit" name="BtnSimpan" class="btn btn-danger">Tambah</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="modal-body col-md-6 mt-3">
                 <div class="table-responsive">
                     <table id="datatables" class="table table-bordered" cellspacing="1">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>Vendor</th>
                                 <th>Tanggal</th>
                                 <th>Noification</th>
                                 <th>Status</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                          $no = 1;
                              // include database
                              include 'koneksi.php';
                              
                              $sql="SELECT tbl_barang.kode_brg as kode,sum(tbl_barang.stok) as stokk,notif.kode_brg,notif.max_stok FROM tbl_barang INNER JOIN notif ON tbl_barang.kode_brg=notif.kode_brg GROUP BY notif.kode_brg HAVING sum(tbl_barang.stok) <= max_stok";
                              
                              $hasil=mysqli_query($kon,$sql);
                              
                              //Menampilkan data dengan perulangan while
                              while ($data = mysqli_fetch_array($hasil)): 
                          ?>
                             <tr>
                                 <td><?= $no++ ?>.</td>
                                 <td><?= $data['kode'];?></td>
                                 <td><?= $data['stokk'];?></td>
                                 <td><?= $data['max_stok'];?></td>
                                 <td><button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                         data-bs-target="#modalUbah<?= $no ?>">Ubah</button>|
                                     <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                         data-bs-target="#modalHapus<?= $no ?>">Hapus</button>
                                 </td>


                             </tr>

                             <!-- Modal Awal Hapus -->
                             <div class="modal fade" id="modalHapus<?= $no ?>" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                 aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <div class="form-group">
                                                 <form action="hapus_notif.php" method="post">
                                                     <input type="hidden" class="form-control" name="kode"
                                                         value="<?= $data['kode']?>">
                                                     <h6 class="text-center">Apakah anda yakin akan menghapus <span
                                                             class="text-danger"><?= $data['kode']?></span> ? <br></h6>
                                             </div>

                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary"
                                                 data-bs-dismiss="modal">Batal</button>
                                             <button type="submit" name="BtnHapus" class="btn btn-danger">Hapus</button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- Modal akhir hapus -->

                             <!-- Modal Awal Ubah -->
                             <div class="modal fade" id="modalUbah<?= $no ?>" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                 aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <form action="ubah_notif.php" method="post">
                                                 <div class="row">
                                                     <div class="col">
                                                         <label class="col-form-label col-form-label-sm"
                                                             for="username">SKU</label>
                                                         <input type="text" class="form-control" name="kode"
                                                             value="<?= $data['kode_brg']?>" readonly>
                                                     </div>
                                                     <div class="col">
                                                         <label class="col-form-label col-form-label-sm"
                                                             for="username">Peringatan Stok</label>
                                                         <input type="text" class="form-control"
                                                             value="<?= $data['max_stok']?>" name="maxStok">
                                                     </div>
                                                 </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary"
                                                 data-bs-dismiss="modal">Batal</button>
                                             <button type="submit" name="BtnEdit" class="btn btn-danger">Ubah</button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- Modal Akhir Ubah -->


                             <?php endwhile; ?>

                         </tbody>
                     </table>
                 </div>
             </div>
             <div>
             </div>

             <script>
             //  $(".tgl").datetimepicker({
             //      format: 'Y-m-d',
             //     //  formatTime: 'H:i',
             //      formatDate: 'Y-m-d',
             //      step: 1,
             //      timepicker: false, // Disables timepicker
             //      //minDate: 0,  // Today
             //      maxDate: 7,  // 7 days from today
             //  });
             // Calculate the maximum date as 7 days from today
             var maxDate = new Date();
             maxDate.setDate(maxDate.getDate() + 7);

             $(".tgl").datetimepicker({
                 format: 'Y-m-d',
                 formatDate: 'Y-m-d',
                 step: 1,
                 timepicker: false, // Disables timepicker
                 minDate: 0, // Today
                 maxDate: maxDate, // 7 days from today
             });
             document.getElementById('customDateIcon').addEventListener('click', function() {
                 document.getElementById('myDateInput')
             .focus(); // Open the date picker when the icon is clicked
             });

             
             </script>


     </main>