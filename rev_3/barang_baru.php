<main>
<div class="container-fluid px-4 mt-3">

      <h5>Tambah Data Barang</h5>
                      
                            <?php 
                            include 'koneksi.php';
                                                // mengambil kode kelas yg paling besar
                                                $queri = mysqli_query($kon, "SELECT max(kode_brg) as kodemax FROM master_brg");
                                                $val = mysqli_fetch_array($queri);
                                                $kode = $val['kodemax'];
                                               
                                                // mengambil angka dari kode kelas terbesar, menggunakan fungsi substr
                                                // dan diubah ke integer dengan (int)
                                                $urutan = (int) substr($kode, 3, 3);
                                               
                                                // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                                                $urutan++;
                                               
                                                $huruf = "BRG";
                                                $kode = $huruf . sprintf("%03s", $urutan);
                            ?>
                          <form action="tambah_brg.php" name="myForm" method="POST" enctype="multipart/form-data">
                         <div class="row">
                          <div class="col">
                          <label class="col-form-label col-form-label-sm" for="username">Kode Barang</label>
                          <input type="text" class="form-control" value="<?php echo $kode ?>" name="kode" readonly>
                          </div>
                          <div class="col">
                          <label class="col-form-label col-form-label-sm">Kode Rak</label>
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
                        <div class="col-sm-5">
                          <label class="col-form-label col-form-label-sm" for="username">Tanggal</label>
                          <input type="datetime-local" class="form-control" name="tgl">
                          
                          </div>
                          <div class="form-group">
                          <label class="col-form-label col-form-label-sm" for="username">catatan</label>
                          <input type="text" class="form-control" name="catatan">
                          </div>
                 
                          </div>
                          <div class="px-4">

                            <button type="submit" name="BtnSimpan" class="btn btn-success mt-2">Tambah</button>
                           
                            </form>
                            </div>
                        </div>


                   
                    </main>
                    
        
