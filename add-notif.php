<main>
  
  

                    
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Form Peringatan Stok</h5>
<br>
<a class="btn btn-dark btn-sm" href="index.php?halaman=notify">Kembali</a>

<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>


   <!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                          <label class="col-form-label col-form-label-sm" for="username">Peringatan Stok</label>
                          <input type="text" class="form-control" name="stokk">
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
                      
                              
<div class="modal-body col-md-10 mt-3">
                    <div class="table-responsive">
                    <table id="tabledet" class="table table-bordered" cellspacing="1">
                        <thead>
                            <tr>						
                                <th>No</th> 
                                <th>Nama Barang</th>
                                <th>Varian</th>
                                <th>SKU</th>
							    <th>QTY</th>
							    <th>Peringatan Stok</th>
							    <th>Aktivitas</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                           
                            $sql="SELECT tbl_barang.kode_brg as kode,sum(tbl_barang.stok) as stokk,tbl_barang.nama_brg,tbl_barang.varian,notif.kode_brg,notif.max_stok FROM tbl_barang INNER JOIN notif ON tbl_barang.kode_brg=notif.kode_brg GROUP BY notif.kode_brg HAVING sum(tbl_barang.stok) <= max_stok";
                            
                            
                            $hasil=mysqli_query($kon,$sql);
                            
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                         
                                
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                             <td><?= $data['nama_brg'];?></td>
                               <td><?= $data['varian'];?></td>
                            <td><?= $data['kode_brg'];?></td>
                            <td><?= $data['stokk'];?></td>
                            <td><?= $data['max_stok'];?></td>
                          
                            <td><button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</button>|
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</button></td>
                          
                           
                           
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
                          <form action="hapus_notif.php" method="post">
                                  <input type="hidden" class="form-control" name="kode" value="<?= $data['kode']?>">
                                  <h6 class="text-center">Apakah anda yakin akan menghapus <span class="text-danger"><?= $data['kode']?></span> ? <br></h6>
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
                          <form action="ubah_notif.php" method="post">
                          <div class="row">
                        <div class="col">
                        <label class="col-form-label col-form-label-sm" for="username">SKU</label>
                          <input type="text" class="form-control" name="kode" value="<?= $data['kode_brg']?>" readonly>
                          </div>
                           <div class="col">
                         <label class="col-form-label col-form-label-sm" for="username">Max Stok</label>
                           <input type="text" class="form-control" value="<?= $data['max_stok']?>" name="maxStok">
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
                      
                 
                        <?php endwhile; ?>
                      
                        </tbody>
                    </table>
                </div>
                </div>
                <div>



</div>
</main>