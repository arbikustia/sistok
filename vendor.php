<main>
<div class="container-fluid px-4 mt-3">
<!-- <h5  class="font-monospace fw-bold">Pengaturan</h5> -->
<a class="btn btn-primary btn mt-1 mb-1"  data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Vendor</a>
</div>

<div class="modal-body col-md-12 px-4 mt-3">
                    <div class="table-responsive">
                    <table id="myTable" class="table table-bordered" cellspacing="1">
                        <thead>
                            <tr>						
                                <th>No</th> 
							    <th>Nama Vendor</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT * FROM vendor";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $data['nama_vendor'];?></td>
                            <td> 
                            <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
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
                          <form action="action/hapus/hapus_vendor.php" method="post">
                                  <input type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                                  <h6 class="text-center">Apakah anda yakin akan menghapus <span class="text-danger"><?= $data['nama_vendor']?></span> ? <br></h6>
                           
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
                          <form action="action/ubah/ubah_vendor.php" method="post">
                          <div class="form-group">
                          <input type="hidden" name="id" value="<?= $data['id']?>" readonly>
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="nama">Nama Toko</label>
                          <input type="text" class="form-control" value="<?= $data['nama_vendor']?>" name="nama">
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
      <h5 class="modal-title" id="exampleModalLabel">Tambah Vendor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="action/tambah/tambah_vendor.php" method="post">
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Nama Market Place</label>
                          <input type="text" class="form-control" name="namaVendor">
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