<main>
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Data Master Barang</h5>
</div>
<!--<div class="container-fluid px-4 mt-3">-->
<!--<a href="master_excel.php" target="_blank" class="btn btn-outline-success btn-sm mt-2">Excel</a>-->
<!--<a href="master_pdf.php" target="_blank" class="btn btn-outline-dark btn-sm mt-2">PDF</a>-->
<!--</div>-->

<div class="modal-body col-md-12 px-4 mt-3">
                    <div class="table-responsive">
                    <table id="datatables" class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>						
                                <th>No</th> 
							     <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Foto</th>
                                <!--<th>Total Stok</th>-->
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT * FROM master_brg";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                                
                                
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $data['kode_brg'];?></td>
                            <td><?php echo $data['nama_brg'];?></td>
						    <td><?php echo $data['satuan'];?></td>
                            <td><?php echo $data['foto_brg'];?></td>
                            <!--<td><?php echo $data['total_stok'];?></td>-->
                            <td> 
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $no ?>">Foto</button> |
                            <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                          </td>
                           
                        </tr>
                     <!-- Modal Awal Ubah -->
                     <div class="modal fade" id="modalUbah<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="ubah_master.php" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                          <label for="" class="form-label">Kode Barang</label>
                          <input type="text" name="kode" class="form-control" value="<?= $data['kode_brg']?>" readonly>
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Nama Barang</label>
                          <input type="text" class="form-control" value="<?= $data['nama_brg']?>" name="nama">
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Satuan</label>
                          <input type="text" class="form-control" value="<?= $data['satuan']?>" name="satuan">
                          </div>
                          <div class="form-group">
                          <label class="form-label" for="">Foto</label><br>
                          <img src="img_brg/<?= $data['foto_brg']?>" width="80">
                         </div>
                        <div class="form-group">
                          <label class="form-label" for="">Ganti Foto</label>
                          <input type="file" name="foto" class="form-control">
                        </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="BtnUbah" class="btn btn-danger">Ubah</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Akhir Ubah -->

                    <!-- modal foto -->
                    <div class="modal fade" id="exampleModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Foto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="card" style="width: 18rem;">
                          <img src="img_brg/<?php echo $data['foto_brg'];?>" class="rounded" width='80%' alt="Tidak Ada Berkas">
                          <div class="card-body">
                      </div>
                    </div>
                          </div>
                          <div class="modal-footer">
                            <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
                           
                          </div>
                        </div>
                      </div>
                    </div>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                 
                </div>
                </div>
                <div>
                    </main>
                    
        
