
<main>
    
<form action="ubah-retur-acc.php" method="post">
                          <label class="mt-2" for="">Konfirmasi Retur Selesai</label>
                           <div class="row">
                          <div class="col-sm-3">
                             <input type="text" name="kode_brg" placeholder="No Transaksi" class="form-control" value="" class="form-control"/>
                              </div>
                             <div class="col">
                            <button class="btn btn-success" name="BtnAcc" type="submit">Selesai</button>
                            <!--<button href="index.php?halaman=transaksi" class="btn btn-warning">Refresh</button>-->
                          </div>
                            </div>
                            </form>
                            <hr>
                            
<div class="modal-body col-md-12">
                    <div class="table-responsive">
                    <table id="tableretur" class="table table-bordered" cellspacing="1">
                        <thead>
                            <tr>						
                                <th>No</th> 
							    <th>No Transaksi</th>
							    <th>SKU</th>
							    <th>Qty</th>
							    <th>Tanggal</th>
							    <th>Catatan</th>
							    <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT * FROM retur where status='sedang di jalan'";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?php echo $data['id_transaksi'];?></td>
                            <td><?php echo $data['kode_brg'];?></td>
                            <td><?php echo $data['qty'];?></td>
                            <td><?php echo $data['tgl'];?></td>
                              <td><?php echo $data['catatan'];?></td>  
                            <td><?php if($data['status'] == 'sedang di jalan'){ echo '<span class="rounded-pill badge bg-warning">sedang di jalan</span>';}?></td>        
                        </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
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
            $('#tableretur').DataTable( {
                "bFilter" : true, 
            //   scrollY :'400px',
            });
        
                       
                  </script>

</main>

                       
      


                    
        
