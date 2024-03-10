<main>
     <!-- css datatables -->
     <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

       <style>
        .table.dataTable  {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 12px;
        }
        </style>
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Transaksi Barang</h5>

<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Pilih Barang
</button>
<a href="index.php?halaman=transaksi" class="btn btn-warning btn-sm mb-2">Refresh</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                    <div class="table-responsive">
                    <table id="datatable" class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>						
                            <th>No</th> 
							              <th>Kode Barang</th>
                                <th>Kode RAK</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <!-- <th>Foto</th> -->
                                <th>Tanggal</th>
                                <th>Catatan</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT * FROM tbl_barang";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                                
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $data['kode_brg'];?></td>
                            <td><?php echo $data['kode_rak'];?></td>
                            <td><?php echo $data['nama_brg'];?></td>
						                <td><?php echo $data['satuan'];?></td>
                            <td><?php echo $data['stok'];?></td>
                            <td><?php echo $data['tgl'];?></td>
                            <td><?php echo $data['catatan'];?></td>
                            <td><a href="index.php?halaman=transaksi&num=<?= $no ?>&idB=<?= $data['id']?>&brg=<?= $data['kode_brg']?>&rak=<?= $data['kode_rak'] ?>&nama=<?= $data['nama_brg'] ?>&stok=<?= $data['stok'] ?>" class="btn btn-success btn-sm">pilih</a></td>
                        </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div>
                   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->

<!-- form tambah -->
<form action="tambah_transaksi.php" method="POST" name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
    
                          <div class="row">
                            <div class="col-sm-2">
                              <label class="form-label" for="">Kode Rak</label>
                              <input type="text" value="<?= $_GET['rak'] ?>" name="rak" class="form-control" readonly>
                              <input type="hidden" value="<?= $_GET['idB'] ?>" class="form-control" name="id_brg" readonly>
                            </div>
                            <div class="col-sm-2">
                              <label class="form-label" for="username">Kode Barang</label>
                              <input type="hidden" value="<?= $_SESSION['id'] ?>" class="form-control" name="id" readonly>
                              <input type="text" value="<?= $_GET['brg'] ?>" class="form-control" name="kode" readonly>
                            </div>
                            <div class="col-sm-4">
                              <label class="form-label" for="username">Nama Barang</label>
                              <input type="text" value="<?= $_GET['nama'] ?>" class="form-control" name="nama" readonly>
                            </div>
                            <div class="col-sm-2">
                          <label for="" class="form-label">Stok</label>
                          <input class="form-control" value="<?= $_GET['stok'] ?>" type="number" name="stok" readonly>
                         </div>
                            </div>
                         <div class="row">
                           <div class="col-sm-2">
                            <label class="col-form-label col-form-label-sm" for="username">Qty</label>
                            <input type="number" value="" max="<?= $_GET['stok'] ?>" class="form-control" name="qty">
                            </div>
                           <div class="col-sm-4">
                           <label class="col-form-label col-form-label-sm" for="username">Tujuan</label>
                           <input type="text" class="form-control" name="tujuan">
                           </div>
                          <div class="col-sm-4">
                          <label class="col-form-label col-form-label-sm" for="username">Tgl Transaksi</label>
                          <input type="datetime-local" value="<?php echo date("Y-m-d");?>" class="form-control" name="tgl_trans">
                          </div>
                          </div>
                          <button type="submit" name="BtnSimpan" class="btn btn-success btn-sm mt-3 mb-2">Tambah</button>
                             
        </form>
        <!-- end form -->
        <div class="d-flex flex-row-reverse bd-highlight">
            <a href="reset.php" name="BtnReset" class="btn btn-danger btn-sm mb-2">Simpan Data</a>
        </div>
        <label for="" class="form-label fw-bold">Keranjang</label>
        <div class="table-responsive">
                    <table id="Table_transaksi" class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>						
                                <th>No</th> 
							    <th>ID Transaksi</th>
                                <th>NO RAK</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tujuan</th>
                                <th>Tanggal</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $queri ="SELECT id_transaksi,id_user,id_brg,tb_rak.NO_RAK,transaksi.kode_brg,nama_brg,transaksi.stok,transaksi.tujuan,transaksi.tgl FROM transaksi LEFT JOIN tbl_barang ON transaksi.id_brg=tbl_barang.id LEFT JOIN tb_rak ON transaksi.kode_rak=tb_rak.NO_RAK WHERE id_user='$_SESSION[id]'";
                            
                            $hl = mysqli_query($kon,$queri);
                          
                            //Menampilkan data dengan perulangan while
                            while ($dt = mysqli_fetch_array($hl)):
                                
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $dt['id_transaksi'];?></td>
                            <td><?php echo $dt['NO_RAK'];?></td>
                            <td><?php echo $dt['kode_brg'];?></td>
                            <td><?php echo $dt['nama_brg'];?></td>
						                <td><?php echo $dt['stok'];?></td>
                            <td><?php echo $dt['tujuan'];?></td>
                            <td><?php echo $dt['tgl'];?></td>
                            <td>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</button> 
                        
                                
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
                          <form action="hapus_trans.php" method="post">
                                  <input type="hidden" class="form-control" name="id" value="<?= $dt['id_transaksi']?>">
                                  <input type="hidden" class="form-control" name="stok" value="<?= $dt['stok']?>">
                                  <input type="hidden" class="form-control" name="id_brg" value="<?= $dt['id_brg']?>">
                                  <h6 class="text-center">Apakah anda yakin akan menghapus barang ini <span class="text-danger"><?= $dt['kode_brg']?></span> ? <br></h6>
                           
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
                   





</div>

<!-- DataTables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script>
    
    $(document).ready(function() {
        $('#datatable').DataTable( {
        } );
    } );

    function validateForm() {
  let x = document.forms["myForm"]["qty"].value;
  if (x == "") {
    alert("Qty Tidak Boleh Kosong");
    return false;
  } 
}
</script>

</main>