<style>
  .market-place {
    height: fit-content;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    column-gap: 2rem;
    row-gap: 1rem;
    width: 40vw;
    margin-top: 1rem;
  }

  .market {
    width: 10rem;
  }
</style>

<main>
  <div class="container-fluid px-4 mt-3">

    <h5>ToDoList</h5>

    <form action="action/tambah/tambah_toDo.php" name="myForm" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-2">
          <label class="col-form-label col-form-label-md">Toko</label>
          <select data-dselect-search="true" name="toko" id="dselect" class="form-select" required>
            <option value="">Pilih Toko</option>
            <?php
            include "koneksi.php";
            //query menampilkan nama unit kerja ke dalam combobox
            $query = mysqli_query($kon, "SELECT * FROM toko");
            while ($row = mysqli_fetch_array($query)) {
              ?>
              <option value="<?= $row['id'] ?>">
                <?= $row['nama_toko'] ?>
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-2">
          <label class="col-form-label col-form-label-md">Nama Barang</label>
          <select data-dselect-search="true" name="brg" id="dselect3" class="form-select" required>
            <option value="">Pilih Barang</option>
            <?php
            include "koneksi.php";
            //query menampilkan nama unit kerja ke dalam combobox
            $query = mysqli_query($kon, "SELECT * FROM master_brg");
            while ($row = mysqli_fetch_array($query)) {
              ?>
              <option value="<?= $row['kode_brg'] ?>">
                <?= $row['nama_brg'] ?>
              </option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div class="col mt-4 ">
        <div>Market Place</div>
        <div class="form-check form-check-inline market-place ">
          <?php
          include "koneksi.php";
          //query menampilkan nama unit kerja ke dalam combobox
          $query = mysqli_query($kon, "SELECT * FROM market_place");
          while ($row = mysqli_fetch_array($query)) {
            ?>
            <div class="market">
              <input class="form-check-input" name="market[]" type="checkbox" id=<?= $row['nama_market'] ?> value=<?= $row['id'] ?>>
              <label class="form-check-label" for=<?= $row['id'] ?>>
                <?= $row['nama_market'] ?>
              </label>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="col">
        <button type="submit" name="BtnSimpan" class="btn btn-primary mt-2">Simpan</button>
      </div>
    </form>
  </div>

  <div class="modal-body col-md-12 px-4 mt-3">
                    <div class="table-responsive">
                    <table id="myTable" class="table table-bordered" cellspacing="1">
                        <thead>
                            <tr>						
                                <th>No</th> 
							                  <th>Toko</th>
                                <th>Market Place</th>
                                <th>Nama Barang</th>
                                <th>Status</th>
                                <th>Waktu</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT t.nama_toko,mp.nama_market,mb.nama_brg, td.status, td.waktu,td.id FROM to_do_list as td LEFT JOIN toko as t ON td.id_toko=t.id LEFT JOIN market_place as mp ON td.id_market = mp.id LEFT JOIN master_brg as mb ON td.id_brg = mb.kode_brg ORDER BY status='selesai' ASC";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $data['nama_toko'];?></td>
                            <td><?php echo $data['nama_market'];?></td>
                            <td><?php echo $data['nama_brg'];?></td>
                            <td><?php if($data['status'] == 'belum selesai'){ echo '<span class="rounded-pill badge bg-danger">belum selesai</span>';}else{echo '<span class="rounded-pill badge bg-success">selesai</span>'; } ?></td>
                            <td><?php echo $data['waktu'];?></td>
                            <td> 
                            <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a> | 
                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a> 
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
                          <form action="action/ubah/ubah_toDoList.php" method="post">
                          <div class="form-group">
                          <!-- <label class="col-form-label col-form-label-sm" for="username">ID User</label> -->
                          <input type="hidden" class="form-control" name="id" value="<?= $data['id']?>" readonly>
                          </div>
                          <div class="form-group">
                          <label class="form-label">Status</label>
                          <select data-dselect-search="true" name="status" id="" class="form-select">
                            <option value="">Pilih</option>
                             <option value="belum selesai" <?php if($data['status']=="belum selesai") echo 'selected="selected"'; ?>>Belum Selesai</option>
                            <option value="selesai" <?php if($data['status']=="selesai") echo 'selected="selected"'; ?>>Selesai</option>
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
                     <!-- Modal Awal Hapus -->
                     <div class="modal fade" id="modalHapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="action/hapus/hapus_toDoList.php" method="post">
                          <div class="form-group">
                                  <input type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                                  <h6 class="text-center">apakah anda yakin ingin menghapus <span class="text-danger"><?= $data['nama_toko']?> - <?= $data['nama_market']?></span> ? <br></h6>
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
                </div>

</main>