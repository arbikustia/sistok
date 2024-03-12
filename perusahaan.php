<main>
<div class="container-fluid px-4 mt-3">
<!-- <h5  class="font-monospace fw-bold">Pengaturan</h5> -->
<a class="btn btn-primary btn mt-1 mb-1"  data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</a>
</div>

<div class="modal-body col-md-12 px-4 mt-3">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered" cellspacing="1">
                            <thead>
                            <tr>						
                                <th>No</th> 
							    <th>Nama Perusahaan</th>
                                <th>Status</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        // include database
                        include 'koneksi.php';
                            
                            $sql="SELECT * FROM perusahaan";
                            
                            $hasil=mysqli_query($kon,$sql);
                            
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                                
                                ?>
                        <tr>
                            <form method="post" action="action/ubah/ubah_status_perusahaan.php">
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $data['nama_perusahaan'];?></td>
                            <input type="hidden" name="valueId" value="<?= $data['id'];?>">
                            <input type="hidden" name="valueStatus" value="<?= $data['status'];?>">
                            <td><?php if($data['status'] == '1'){ echo '<span class="rounded-pill badge bg-success">aktif</span>';}else{echo '<span class="rounded-pill badge bg-danger">Non AKtif</span>'; } ?></td>
                            <td> 
                           <?php if($data['status'] == '0'){echo '<button class="btn btn-success btn-sm" type="submit" name="BtnUpdate">Aktif</button>';}else{echo '<button class="btn btn-danger btn-sm" type="submit" name="BtnUpdate">Non Aktif</button>';}?>
                            <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                          </td>
                          </form>
                           
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
                          <form action="action/hapus/hapus_perusahaan.php" method="post">
                                  <input type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                                  <h6 class="text-center">Apakah anda yakin akan menghapus <span class="text-danger"><?= $data['nama_perusahaan']?></span> ? <br></h6>
                           
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
                          <form action="action/ubah/ubah_perusahaan.php" method="post">
                          <div class="form-group">
                          <input type="hidden" name="id" value="<?= $data['id']?>" readonly>
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="nama">Nama Perusahaan</label>
                          <input type="text" class="form-control" value="<?= $data['nama_perusahaan']?>" name="nama">
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="BtnEdit" class="btn btn-warning">Ubah</button>
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

   <!-- Modal Tambah -->
   <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="action/tambah/tambah_perusahaan.php" method="post">
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Nama Perusahaan</label>
                          <input type="text" class="form-control" name="nama">
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="BtnSimpan" class="btn btn-primary">Tambah</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    </div>
  <!-- end modal tambah -->
</main>