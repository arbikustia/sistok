<style>
    .modal-body{
        width: 100%;
    }
</style>
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
    /* width: 100%; */
    height: fit-content;
    display: flex;
    flex-direction: column;
    gap: 3rem;
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
        <h5 class="font-monospace fw-bold">Pembayaran Jatuh Tempo</h5>


        <div class="modal-body col-md-6 mt-3">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered" cellspacing="1">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Vendor</th>
                        <th>Notification</th>
                        <th>Status</th>
                        <th>Diperbaharui Oleh</th>
                        <th>Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $no = 1;
                              // include database
                              include 'koneksi.php';
                              $sql="SELECT ph.id as id_hutang, ph.tanggal, v.nama_vendor, ph.tglNotif, ph.status, ph.id_user FROM pembayaran_hutang as ph LEFT JOIN vendor as v ON ph.id_vendor=v.id WHERE ph.status='Belum Bayar' AND CURRENT_DATE() > tglNotif order by ph.waktu desc;";                            
                              $hasil=mysqli_query($kon,$sql);                     
                              //Menampilkan data dengan perulangan while
                              while ($data = mysqli_fetch_array($hasil)):      
                          ?>
                        <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $data['tanggal'];?></td>
                        <td><?= $data['nama_vendor'];?></td>
                        <td><?= $data['tglNotif'];?></td>
                        <td><?php if($data['status'] == 'Belum Bayar'){ echo '<span class="rounded-pill badge bg-danger">Belum Bayar</span>';}else{echo '<span class="rounded-pill badge bg-success">Sudah Bayar</span>'; } ?></td>
                        <td><?= $data['id_user'];?></td>
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
                                                 <form action="action/hapus/hapus_pembayaran_hutang.php" method="post">
                                                     <input type="hidden" class="form-control" name="id"
                                                         value="<?= $data['id_hutang']?>">
                                                     <h6 class="text-center">Apakah anda yakin akan menghapus <span
                                                             class="text-danger"><?= $data['nama_vendor']?></span> ? <br></h6>
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
                                         <form action="action/ubah/ubah_bayar_hutang.php" method="post">
                                         <div class="modal-body">
                                         <!-- <div class="form-group"> -->
                                                
                                                <!-- <label class="col-form-label col-form-label-sm" for="username">Tanggal</label> -->
                                                <input type="hidden" class="form-control" name="id" value="<?= $data['id_hutang']?>">
                                        <!-- </div> -->
                                           <!-- <div class="form-group">                                               
                                                <label class="col-form-label col-form-label-sm" for="username">Tanggal</label>
                                                <input type="date" class="form-control" name="tgl1" value="<?= $data['tanggal1']?>">
                                            </div>
                                      <div class="form-group">
                                        <label class="form-label">Vendor</label>
                                        <select data-dselect-search="true" name="vendor" id="dselect3" class="form-select">
                                            <option value="">Pilih</option>
                                            <?php  
                                            include "koneksi.php";
                                            //query menampilkan nama unit kerja ke dalam combobox
                                            $query = mysqli_query($kon, "SELECT * FROM vendor");
                                            while ($vall = mysqli_fetch_array($query)) {
                                            ?>
                                            <option value="<?= $vall['id'] ?>"<?php if($data['nama_vendor']==$vall['nama_vendor']){echo "selected";} ?>><?= $vall['nama_vendor']?></option>
                                            <?php } ?>
                                            </select>
                                      </div>
                                      <div class="form-group">
                                                
                                                <label class="col-form-label col-form-label-sm" for="username">Tanggal</label>
                                                <input type="date" class="form-control" name="tgl2" value="<?= $data['tanggal2']?>">
                                     </div>
                                     <div class="form-group">
                                     <label class="notif" for="tgll">Notification <i class="fa-solid fa-bell"></i></label>
                                     <input type="" class="tgll form-control" value="<?= $data['tglNotif']?>" id="tgll" name="tglNotif"> -->
                                 <!-- </div> -->
                                 <div class="form-group">
                                    <label class="col-form-label col-form-label-sm" for="username">Status</label>
                                    <select name="status" class="form-select">
                                        <option >Pilih</option>
                                        <option value="Belum Bayar" <?php if($data['status']=="Belum Bayar") echo 'selected="selected"'; ?> >Belum Bayar</option>
                                        <option value="Sudah Bayar" <?php if($data['status']=="Sudah Bayar") echo 'selected="selected"'; ?> >Sudah Bayar</option>
                                    </select>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="BtnEdit" class="btn btn-warning">Ubah</button>
                                        </form>
                                    </div> 
                             </div>
                             <!-- Modal Akhir Ubah -->
                    

                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
    <div>


            <script>
             $(".tgll").datetimepicker({
                 format: 'Y-m-d',
                 formatDate: 'Y-m-d',
                 step: 1,
                 timepicker: false, // Disables timepicker
                 minDate: 0, // Today
                 maxDate: maxDate, // 7 days from today
             });
             document.getElementById('customDateIcon').addEventListener('click', function() {
             document.getElementById('myDateInput').focus(); // Open the date picker when the icon is clicked
});

             </script>  


        </div>


</main>