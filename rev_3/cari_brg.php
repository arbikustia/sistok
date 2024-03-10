<main>
<?php

$koneksi = new mysqli("localhost", "sistokmy_rott", "@Adeputri99", "sistokmy_sistok");
$semuadata = [];
$cari = "";

if(isset($_POST['submit'])){
  $cari = $_POST['cari'];
 

  $ambil = $koneksi->query("SELECT * FROM tbl_barang WHERE kode_brg like '%".$cari."%' OR nama_brg like '%".$cari."%'");
  while($pecah = $ambil->fetch_assoc()){
    $semuadata[] = $pecah;
  }

}

?>

    
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Pencarian Barang</h5>
<!--<button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>-->

<form action="" method="post">
                          <label class="mt-2" for="">Cari Barang Berdasarkan Kode Barang Atau Nama Barang</label>
                           <div class="row">
                          <div class="col-sm-2">
                             <input type="text" name="cari" placeholder="Enter" class="form-control-sm text-uppercase" value="<?= $cari;?>" class="form-control"/>
                              </div>
                             <div class="col">
                            <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Cari</button>
                            <button href="index.php?halaman=cari_barang" class="btn btn-warning btn-sm">Refresh</button>
                          </div>
                            </div>
</form>
</div>

<div class="modal-body col-md-8 px-4 mt-3">
                    <div class="table-responsive">
                    <table id="tbCari" class="table table-bordered" cellspacing="1">
                        <thead>
                            <tr>						
                                <th>No</th> 
							    <th>Nama Barang</th>
							    <th>Nomor RAK</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                         <?php foreach($semuadata as $key => $dt): ?>
                        
                        <tr>
                            <td><?= $key+1 ?>.</td>
                            <td><?php echo $dt['nama_brg'];?></td>
                            <td><?php echo $dt['kode_rak'];?></td>
                            <td><?php echo $dt['stok'];?></td>
                        </tr>
                    
                          <?php
                           endforeach;
                           ?>
                        </tbody>
                    </table>
                </div>
                </div>
                <div>

                  </main>

                       
      


                    
        
