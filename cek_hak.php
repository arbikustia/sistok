<main>
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Hak Akses</h5>



      <div class="table-responsive col-sm-8">
                    <table id="myTable" class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>						
                            <th>No</th> 
							<th>ID User</th>
                            <th>Username</th>
                            <th>Menu</th>
                            <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT privileges.id,privileges.id_user,user.username,privileges.link,privileges.page FROM privileges LEFT JOIN user ON privileges.id_user=user.id";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                            
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $data['id_user'];?></td>
                            <td><?php echo $data['username'];?></td>
                            <td><?php echo $data['page'];?></td>
                            
                            <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</button>
                              <!--<button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">hapus</button>-->
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
                          <form action="hapus_akses.php" method="post">
                          <div class="form-group">
                                  <input type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                                  <h6 class="text-center">Hapus akses <span class="text-danger"><?= $data['username']?> - <?= $data['page']?></span> ? <br></h6>
                                 </div>
                          </div>
                          <div class="modal-footer">
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
            
                    <!-- end modal hak akses -->
                    
      </div>
                            </main>
        