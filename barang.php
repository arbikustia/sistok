<main>
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Data Barang</h5>
<a class="btn btn-primary btn-sm mt-1 mb-1" href="index.php?halaman=input">Input Barang</a>
<!--<button class="btn btn-success btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalBaru">Barang Baru</button>-->
<div class="row">
    <div class="col-md-6">
<form action="" method="post">
                          <h6>Cari Dengan SKU/Nama</h6>
                          <input type="text" name="cari" placeholder="Enter" class="form-control-sm" value="<?= $cari;?>" class="form-control"/>
                            <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Cari</button>
                            <button href="index.php?halaman=barang" class="btn btn-warning btn-sm">Refresh</button>
                        
</form>
</div>
<div class="col-md-4">
                                <h6>Import Data Barang </h6>
                                <!--<h6>pastikan file ber-ekstensi xls</h6>-->
                                <!-- membuat form input file -->
                                <form method="POST" enctype="multipart/form-data" action="import.php">
                                    <input class="form-control col-md-3" name="import_file" type="file"/>
                                    <button class="btn btn-sm btn-primary mt-1" name="btnImport" type="submit">Import</button>
                                    <a href="data_excel.php" class="link mt-1">template excel</a>
                                </form>
                          
    </div>
    <div>
        
</div>
<div class="container-fluid px-4 mt-1">
<a href="data.php" target="_blank" class="btn btn-outline-success btn-sm mt-2">Excel</a>
<a href="cetak.php" target="_blank" class="btn btn-outline-dark btn-sm mt-2">PDF</a>
</div>

<div class="modal-body col-md-12 px-4 mt-1">
                    <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>						
                                <th>No</th> 
							                  <th>SKU</th>
                                <th>Nama Barang</th>
                                 <th>Varian</th> 
                                <th>Stok</th>
                                <th>NO RAK</th>
                                <th>Tanggal</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                       include "koneksi.php";
                        $no = 1;
                        if(isset($_REQUEST['submit'])){
                        $cari = $_POST['cari'];
                        $sql = "SELECT * FROM tbl_barang WHERE kode_brg like '%".$cari."%' OR nama_brg like '%".$cari."%' order by tgl asc";
                        $konek = mysqli_query($kon,$sql);
                    }
                    else{
                        $sql="SELECT * FROM tbl_barang order by tgl asc";
                        $konek = mysqli_query($kon,$sql);
                    }
                         while($row = mysqli_fetch_array($konek)){
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $row['kode_brg'];?></td>
                            <td><?php echo $row['nama_brg'];?></td>
                            <td><?php echo $row['varian'];?></td>
                            <td><?php echo $row['stok'];?></td>
                            <td><?php echo $row['kode_rak'];?></td>
                            <td><?php echo $row['tgl'];?></td>
                            <td><?php echo $row['catatan'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td> 
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $no ?>">Foto</button>|
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</button>|
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
                          <form action="hapus_brg.php" method="post">
                                  <input type="hidden" class="form-control" name="id" value="<?= $row['id']?>">
                                  <h6 class="text-center">Apakah anda yakin akan menghapus <span class="text-danger"><?= $row['nama_brg']?></span> ? <br></h6>
                           
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
                          <form action="ubah_brg.php" method="post" enctype="multipart/form-data">
                          <div class="row">
                          <div class="col">
                          <label for="" class="form-label">SKU</label>
                          <input type="hidden" class="form-control" name="id" value="<?= $row['id']?>" readonly>
                          <input type="text" class="form-control" value="<?= $row['kode_brg']?>"readonly>
                          </div>
                          <div class="col">
                          <label class="col-form-label col-form-label-sm" for="username">Nama Barang</label>
                          <input type="text" class="form-control" value="<?= $row['nama_brg']?>" name="nama" readonly>
                          </div>
                          </div>
                          <div class="row">
                         
                          <div class="col">
                          <label class="col-form-label col-form-label-sm" for="username">Foto</label>
                          <input type="text" class="form-control" value="<?= $row['foto_brg']?>" name="foto" readonly>
                          </div>
                           <div class="col">
                          <label class="col-form-label col-form-label-sm" for="username">Status</label>
                          <select name="status" class="form-select">
                            <option >Pilih</option>
                            <option value="selesai" <?php if($row['status']=="selesai") echo 'selected="selected"'; ?> >selesai</option>
                            <option value="pending" <?php if($row['status']=="pending") echo 'selected="selected"'; ?> >pending</option>
                          </select>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col">
                          <label class="col-form-label col-form-label-sm" for="username">Varian</label>
                          <input type="text" class="form-control" value="<?= $row['varian']?>" name="varian">
                          </div>
                          <div class="col">
                          <label class="col-form-label col-form-label-sm" for="username">Stok</label>
                          <input type="text" class="form-control" value="<?= $row['stok']?>" name="stok">
                          </div>
                          </div>
    
                          <div class="row">
                          <div class="col">
                          <label class="col-form-label col-form-label-sm" for="username">Tanggal</label>
                          <input type="datetime-local" class="form-control" name="tgl" value="<?= $row['tgl']?>" name="satuan">
                          </div>
                          <div class="col">
                          <label class="form-label">NO RAK</label>
                          <select data-dselect-search="true" name="rak" id="dselect3" class="form-select">
                            <option value="">Pilih Rak</option>
                            <?php  
                            include "koneksi.php";
                            //query menampilkan nama unit kerja ke dalam combobox
                            $query = mysqli_query($kon, "SELECT * FROM tb_rak");
                            while ($vall = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?= $vall['NO_RAK'] ?>"<?php if($row['kode_rak']==$vall['NO_RAK']){echo "selected";} ?>><?= $vall['NO_RAK']?></option>
                            <?php } ?>
                            </select>
                          </div>
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Catatan</label>
                          <input type="text" class="form-control" value="<?= $row['catatan']?>" name="catatan">
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
                          <img src="img_brg/<?php echo $row['foto_brg'];?>" class="rounded" width='80%' alt="Tidak Ada Berkas">
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
                        <?php } ?>
                        </tbody>
                    </table>
                 
                </div>
                </div>
                <div>

 
                    <!-- modal barang baru -->
                    
<div class="modal fade" id="modalBaru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="tambah_brg.php" onsubmit="return validateForm()" name="myForm" method="POST" enctype="multipart/form-data">
                         <div class="row">
                          <div class="col">
                          <label class="col-form-label col-form-label-sm" for="username">SKU</label>
                          <input type="text" class="form-control" name="kode">
                          </div>
                          <div class="col">
                          <label class="col-form-label col-form-label-sm">NO RAK</label>
                          <select data-dselect-search="true" name="rak" id="dselect3" class="form-select">
                            <option value="">Pilih Rak</option>
                            <?php  
                            include "koneksi.php";
                            //query menampilkan nama unit kerja ke dalam combobox
                            $query = mysqli_query($kon, "SELECT * FROM tb_rak");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?= $row['NO_RAK'] ?>"><?= $row['NO_RAK']?></option>
                            <?php } ?>
                            </select>
                          </div>
                          </div>
                        <div class="row">
                          <div class="col">
                          <label class="col-form-label col-form-label-sm" for="username">Nama Barang</label>
                          <input type="text" class="form-control" name="nama">
                          </div>
                          <div class="col">
                          <label class="col-form-label col-form-label-sm" for="username">Satuan</label>
                          <input type="text" class="form-control" name="satuan">
                          </div>
                          </div>
                         <div class="row">
                          <div class="col-sm-3">
                          <label class="col-form-label col-form-label-sm" for="username">Stok</label>
                          <input type="number" class="form-control" name="stok">
                          </div>
                          <div class="col">
                          <label for="Image" class="form-label">Foto</label>
                          <input class="form-control" type="file" name="foto">
                        </div>
                          </div>
                        <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">Tanggal</label>
                          <input type="datetime-local" class="form-control" name="tgl">
                          
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">catatan</label>
                          <input type="text" class="form-control" name="catatan">
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

                    <!-- end modal -->

                    <script>
                         function validateForm() {
                      let x = document.forms["myForm"]["nama"].value;
                      if (x == "") {
                        alert("Nama barang Tidak Boleh Kosong");
                        return false;
                    } 
                    </script>

                    
                    </main>
                    
        
