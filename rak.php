<main>


    
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Data Rak</h5>
<button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>

<form action="" method="post">
                          <label class="mt-2" for="">NO RAK</label>
                           <div class="row">
                          <div class="col-sm-2">
                             <input type="text" name="cari" placeholder="Enter" class="form-control-sm text-uppercase" value="<?= $cari;?>" class="form-control"/>
                              </div>
                             <div class="col">
                            <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Cari RAK</button>
                            <button href="index.php?halaman=rak" class="btn btn-warning btn-sm">Refresh</button>
                          </div>
                            </div>
</form>
    <a href="rak_csv.php" target="_blank" class="btn btn-outline-success btn-sm mt-2">Backup Data</a>
</div>

<div class="modal-body col-md-8 px-4 mt-3">
                    <div class="table-responsive">
                    <table id="tablerak" class="table table-bordered" cellspacing="1">
                        <thead>
                            <tr>						
                                <th>No</th> 
							    <th>NO RAK</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                       
                        if(isset($_REQUEST['submit'])){
                        $cari = $_POST['cari'];
                        $sql = "SELECT * FROM tb_rak WHERE NO_RAK = '$cari'";
                        $konek = mysqli_query($kon,$sql);
                    }
                    else{
                        $sql="SELECT * FROM tb_rak";
                        $konek = mysqli_query($kon,$sql);
                    }
                         while($row = mysqli_fetch_array($konek)){
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $row['NO_RAK'];?></td>
                       
                            <td> 
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">hapus</button> |
                            <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                          </td>
                           
                        </tr>
                        
                        <!-- Modal Awal Hapus -->
                    <div class="modal fade" id="modalHapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group">
                          <form action="hapus_rak.php" method="post">
                                  <input type="hidden" class="form-control" name="kode" value="<?= $row['NO_RAK']?>">
                                  <h6 class="text-center">Apakah anda yakin akan menghapus <span class="text-danger"><?= $row['NO_RAK']?></span> ? <br></h6>
                                 </div>
                      
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="BtnHapus" class="btn btn-danger">Hapus</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal akhir hapus -->

                     <!-- Modal Awal Ubah -->
                     <div class="modal fade" id="modalUbah<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="ubah_rak.php" method="post">
                          <div class="row">
                        <div class="col">
                        <label class="col-form-label col-form-label-sm" for="username">NO RAK</label>
                          <input type="text" class="form-control" name="kodeawal" value="<?= $row['NO_RAK']?>" readonly>
                          </div>
                           <div class="col">
                         <label class="col-form-label col-form-label-sm" for="username">NO RAK Baru</label>
                           <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" name="kode">
                          </div>
                           </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="BtnEdit" class="btn btn-danger">Ubah</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Akhir Ubah -->
                          <?php
                           }
                           ?>
                        </tbody>
                    </table>
                </div>
                </div>
                <div>


   <!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Rak</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="tambah_rak.php" method="post">
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">NO RAK</label>
                          <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" name="kode">
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
                  </main>

                       
      


                    
        
