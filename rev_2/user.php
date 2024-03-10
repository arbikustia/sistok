<main>
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Data User</h5>
<button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah User</button>
<button class="btn btn-outline-dark btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalLog">Log User</button>
</div>

<div class="modal-body col-md-8 px-4 mt-3">
                    <div class="table-responsive">
                    <table id="myTable" class="table table-bordered" cellspacing="1">
                        <thead>
                            <tr>						
                                <th>No</th> 
							    <th>ID User</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT * FROM user";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $data['id'];?></td>
                            <td><?php echo $data['username'];?></td>
                            <td><?php echo $data['password'];?></td>
                            <td><?php echo $data['level'];?></td>
                            <td> 
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
                          <form action="ubah_user.php" method="post">
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">ID User</label>
                          <input type="text" class="form-control" name="id" value="<?= $data['id']?>" readonly>
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Username</label>
                          <input type="text" class="form-control" value="<?= $data['username']?>" name="nama">
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Password</label>
                          <input type="text" class="form-control" value="<?= $data['password']?>" name="pass">
                          </div>
                          <div class="form-group">
                          <label class="form-label">Level</label>
                          <select data-dselect-search="true" name="level" id="" class="form-select">
                            <option value="">Pilih Level</option>
                            <?php  
                            include "koneksi.php";
                            //query menampilkan nama unit kerja ke dalam combobox
                            $query = mysqli_query($kon, "SELECT * FROM user");
                            while ($vall = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?= $vall['level'] ?>"<?php if($data['level']==$vall['level']){echo "selected";} ?>><?= $vall['level']?></option>
                            <?php } ?>
                            </select>
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


   <!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Rak</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <?php 
                              include 'koneksi.php';

                                                // mengambil kode kelas yg paling besar
                                                $queri = mysqli_query($kon, "SELECT max(id) as kodemax FROM user");
                                                $val = mysqli_fetch_array($queri);
                                                $kode = $val['kodemax'];
                                               
                                                // mengambil angka dari kode kelas terbesar, menggunakan fungsi substr
                                                // dan diubah ke integer dengan (int)
                                                $urutan = (int) substr($kode, 4, 4);
                                               
                                                // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                                                $urutan++;
                                               
                                                $huruf = "user";
                                                $kode = $huruf . sprintf("%03s", $urutan);
                                                
                            ?>
                          <form action="tambah_user.php" method="post">
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">ID User</label>
                          <input type="text" class="form-control" value="<?php echo $kode ?>" name="id" readonly>
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Username</label>
                          <input type="text" class="form-control" name="nama">
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Password</label>
                          <input type="text" class="form-control" name="pass">
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Username</label>
                          <select type="text" value="" class="form-select" name="level">
                            <option value="Admin">Admin</option>
                            <option value="Pegawai">Pegawai</option>
                          </select>
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
                    
                             <!-- Modal Log-->
<div class="modal fade" id="modalLog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="table-responsive">
                    <table id="myTable" class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>						
                            <th>No</th> 
							              <th>Username</th>
                            <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT * FROM log_login";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                                
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $data['username'];?></td>
                            <td><?php echo $data['waktu'];?></td>
                        </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div>
                <div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal log -->
                  </main>

                       
      


                    
        
