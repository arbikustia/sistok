
<main>

<form action="ubah-acc.php" method="post">
                          <label class="mt-2" for="">Konfirmasi Selesai</label>
                           <div class="row">
                          <div class="col-sm-3">
                             <input type="text" name="kode" placeholder="No Transaksi" class="form-control" value="" class="form-control"/>
                              </div>
                             <div class="col">
                            <button class="btn btn-success" name="BtnEdit" type="submit">Selesai</button>
                            <!--<button href="index.php?halaman=transaksi" class="btn btn-warning">Refresh</button>-->
                          </div>
                            </div>
                            </form>
 <hr>
                          
<div class="modal-body col-md-12">
                    <div class="table-responsive">
                    <table id="tabletran" class="table table-bordered" cellspacing="1">
                        <thead>
                            <tr>						
                                <th>No</th> 
							    <th>No Transaksi</th>
							    <th>Lokasi Asal</th>
							    <th>Lokasi Tujuan</th>
							    <th>Tanggal</th>
							    <th>Status</th>
							  
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT DISTINCT id_transaksi,asal,tujuan,tgl,status,catatan FROM transaksi where status='sedang di jalan'";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td name="kode"><a href="index.php?halaman=detail&id=<?=$data['id_transaksi'];?>"><?php echo $data['id_transaksi'];?></a></td>
                            <td><?php echo $data['asal'];?></td>
                            <td><?php echo $data['tujuan'];?></td>
                            <td><?php echo $data['tgl'];?></td>  
                            <td><?php if($data['status'] == 'sedang di jalan'){ echo '<span class="rounded-pill badge bg-warning">sedang di jalan</span>';}?></td>   
                        </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                    
                </div>
                </div>
                            <!--<button class="btn btn-success btn-sm" type="submit" name="BtnUpdate">Selesai</button>-->

</form>
                
                
                
                
                    
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
            $('#tabletran').DataTable( {
                "bFilter" : true, 
            //   scrollY :'400px',
            });
        
                       
                  </script>

</main>

                       
      


                    
        
