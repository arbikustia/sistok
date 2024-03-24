<main>
<div class="container-fluid px-4 mt-3">
<!--<h5  class="font-monospace fw-bold">Lokasi</h5>-->



        
          <h5>Tambah Data Lokasi</h5>
          <form method="POST" action="action/tambah/tambah_gudang.php">
              
                <div class="row">
                <div class="col-sm-4">
                            <label class="form-label" for="">Nama Lokasi</label>
                              <input name="lokasi" class="form-control" required>
                            </div>
                             <div class="col-sm-4">
                            <label class="form-label" for="">Ket</label>
                              <select data-dselect-search="true" name="level" id="dselect3" class="form-select">
                                  <option>asal</option>
                                   <option>tujuan</option>
                                  </select>
                            </div>
                             </div>
                              <button name="BtnSimpan" class="btn btn-success btn-sm mt-1" type="submit" >Simpan</button>
          </form>
      <div class="table-responsive mt-2">
                    <table id="datatables" class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>						
                            <th>No</th> 
							<th>Nama Lokasi</th>
                            <th>Ket</th>
                            <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT * FROM gudang";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                                
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $data['nama_lokasi'];?></td>
                            <td><?php echo $data['level'];?></td>
                            <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</button></td>
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
                          <form action="action/hapus/hapus_lokasi.php" method="post">
                                  <input type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                                  <h6 class="text-center">Hapus lokasi <span class="text-danger"><?= $data['nama_lokasi']?></span> ? <br></h6>
                           
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
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div>
                <div>
      
       <div>
           </main>