<main>
<div class="container-fluid px-4 mt-2">
<h5  class="font-monospace fw-bold">Data Barang</h5>

<div class="container-fluid px-4 mt-1">
<a href="data.php" target="_blank" class="btn btn-outline-success btn-sm mt-2">Excel</a>
<a href="cetak.php" target="_blank" class="btn btn-outline-dark btn-sm mt-2">PDF</a>
</div>

<div class="modal-body col-md-12 px-4 mt-1">
                    <div class="table-responsive">
                    <table id="table_detail" class="table table-bordered" cellspacing="0">
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
                                <!--<th>Aktivitas</th>-->
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                       
                        $sql="SELECT * FROM tbl_barang order by tgl asc";
                        $konek = mysqli_query($kon,$sql);
                    
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
                 
                           
                        </tr>
        
                        <?php } ?>
                        </tbody>
                    </table>
                 
                </div>
                </div>
                <div>

 
                    </main>
                    
        
