<main>
    <div class="container-fluid px-4 mt-3">       
        <h5 class="font-monospace fw-bold">Pembayaran Jatuh Tempo</h5>
             <!-- <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah">Tambah</button> -->

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
                             <form action="action/tambah/tambah_bayar_ekspedisi.php" method="post">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Tanggal</label>
                                     <input type="date" class="form-control" id="exampleInputEmail1"
                                         aria-describedby="emailHelp" name="tanggal" placeholder="Tanggal">
                                 </div>
                                 <div class="form-group">
                                 <label class="col-form-label col-form-label-sm">Ekspedisi</label>
                                    <select data-dselect-search="true" name="ekspedisi" id="dselect3" class="form-select" required>
                                        <option value="">Pilih</option>
                                        <?php  
                                        include "koneksi.php";
                                        //query menampilkan nama unit kerja ke dalam combobox
                                        $query = mysqli_query($kon, "SELECT * FROM ekspedisi");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['nama_ekspedisi']?></option>
                                        <?php } ?>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="marking">Marking</label>
                                     <input type="text" class="form-control" name="marking">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Estimasi Tiba</label>
                                     <input type="date" name="estimasi" class="form-control" id="exampleInputPassword1" >
                                 </div>
                                 <div class="modal-footer mt-2">
                                     <button type="button" class="btn btn-secondary"
                                         data-bs-dismiss="modal">Batal</button>
                                     <button type="submit" name="BtnSimpan" class="btn btn-primary">Simpan</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>


        <div class="modal-body col-md-12 mt-3">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered" cellspacing="1">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Ekspedisi</th>
                        <th>Marking</th>
                        <th>Estimasi Tiba</th>
                        <th>Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $no = 1;
                              // include database
                              include 'koneksi.php';
                              $sql="SELECT ec.id,ec.tanggal,ec.marking,ec.estimasi, e.nama_ekspedisi FROM `ekspedisi_china` as ec LEFT JOIN ekspedisi as e ON ec.id_ekspedisi=e.id order by ec.waktu desc";                            
                              $hasil=mysqli_query($kon,$sql);                     
                              //Menampilkan data dengan perulangan while
                              while ($data = mysqli_fetch_array($hasil)):      
                          ?>
                        <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $data['tanggal'];?></td>
                        <td><?= $data['nama_ekspedisi'];?></td>
                        <td><?= $data['marking'];?></td>
                        <td><?= $data['estimasi'];?></td>
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
                                                 <form action="action/hapus/hapus_bayar_ekspedisi.php" method="post">
                                                     <input type="hidden" class="form-control" name="id"
                                                         value="<?= $data['id']?>">
                                                     <h6 class="text-center">Apakah anda yakin akan menghapus <span
                                                             class="text-danger"><?= $data['nama_ekspedisi']?></span> ? <br></h6>
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
                                         <form action="action/ubah/ubah_bayar_ekspedisi.php" method="post">
                                         <div class="modal-body">
                                         <div class="form-group">
                                                
                                                <!-- <label class="col-form-label col-form-label-sm" for="username">Tanggal</label> -->
                                                <input type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                                        </div>
                                         <div class="form-group">  
                                                <label class="col-form-label col-form-label-sm" for="username">Tanggal</label>
                                                <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal']?>">
                                            </div>
                                      <div class="form-group">
                                        <label class="form-label">Ekspedisi</label>
                                        <select data-dselect-search="true" name="ekspedisi" id="dselect3" class="form-select">
                                            <option value="">Pilih</option>
                                            <?php  
                                            include "koneksi.php";
                                            //query menampilkan nama unit kerja ke dalam combobox
                                            $query = mysqli_query($kon, "SELECT * FROM ekspedisi");
                                            while ($vall = mysqli_fetch_array($query)) {
                                            ?>
                                            <option value="<?= $vall['id'] ?>"<?php if($data['nama_ekspedisi']==$vall['nama_ekspedisi']){echo "selected";} ?>><?= $vall['nama_ekspedisi']?></option>
                                            <?php } ?>
                                            </select>
                                      </div>
                                      <div class="form-group">
                                      <label class="">Marking</label>
                                      <input type="" class="form-control" value="<?= $data['marking']?>" name="marking"> 
                                  </div>
                                      <div class="form-group">                                             
                                            <label class="col-form-label col-form-label-sm" for="username">Estimasi</label>
                                            <input type="date" class="form-control" name="estimasi" value="<?= $data['estimasi']?>">
                                     </div>
                                
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


          


        </div>


</main>