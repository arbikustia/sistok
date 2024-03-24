
<main>

<div class="modal-body col-md-12">
                    <div class="table-responsive">
                    <table id="tableSelesai" class="table table-bordered" cellspacing="1">
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
                            
                            $sql="SELECT DISTINCT id_transaksi,asal,tujuan,tgl,status,catatan FROM transaksi where status='selesai'";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                          
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><a href="index.php?halaman=detail&id=<?=$data['id_transaksi'];?>"><?php echo $data['id_transaksi'];?></a></td>
                            <td><?php echo $data['asal'];?></td>
                            <td><?php echo $data['tujuan'];?></td>
                            <td><?php echo $data['tgl'];?></td>  
                            <td><?php if($data['status'] == 'selesai'){ echo '<span class="rounded-pill badge bg-success">selesai</span>';}?></td>        
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
            $('#tableSelesai').DataTable( {
                "bFilter" : true, 
            //   scrollY :'400px',
            });
        
                       
                  </script>

</main>

                       
      


                    
        
