<main>
    <?php 
    $id = $_GET['id'];
    ?>
  
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Detail Transaksi</h5>
<a class="btn btn-dark btn-sm" href="index.php?halaman=transaksi">Kembali</a>

<div class="modal-body col-md-10 mt-3">
                    <div class="table-responsive">
                    <table id="tabledet" class="table table-bordered" cellspacing="1">
                        <thead>
                            <tr>						
                                <th>No</th> 
                                <th>ID Transaksi</th>
                                <th>ID User</th>
							    <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Varian</th>
                                <th>NO RAK</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT transaksi.id_transaksi,transaksi.id_user,transaksi.kode_brg,transaksi.kode_rak,transaksi.stok,master_brg.nama_brg FROM transaksi INNER JOIN master_brg ON transaksi.kode_brg=master_brg.kode_brg WHERE transaksi.id_transaksi='$id'";
                            
                            $hasil=mysqli_query($kon,$sql);
                            $tot_bayar = 0;
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
 
                        ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data['id_transaksi'];?></td>
                            <td><?= $data['id_user'];?></td>
                            <td><?= $data['kode_brg'];?></td>
                            <td><?= $data['nama_brg'];?></td>
                            <td><?= $data['varian']; ?></td>
                            <td><?= $data['kode_rak'];?></td>
                            <td><?= $data['stok'];?></td>
                           
                        </tr>
                      
                 
                        <?php endwhile; ?>
                      
                        </tbody>
                    </table>
                </div>
                </div>
                <div>
                    
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
            $('#tabledet').DataTable( {
                "bFilter" : true, 
            //   scrollY :'400px',
            });
        
                       
                  </script>

                


</div>
</main>