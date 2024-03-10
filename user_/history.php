<main>
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">History Transaksi</h5>


        <div class="table-responsive mt-3">
                    <table id="myTable" class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>						
                                <th>No</th> 
							    <th>ID User</th>
                                <th>Kode RAK</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tujuan</th>
                                <th>Tanggal</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $queri ="SELECT riwayat.id_user,riwayat.kode_rak,riwayat.kode_brg,master_brg.nama_brg,riwayat.stok,riwayat.tujuan,riwayat.tgl FROM riwayat LEFT JOIN master_brg ON riwayat.kode_brg=master_brg.kode_brg WHERE id_user='$_SESSION[id]'";
                            
                            $hl = mysqli_query($kon,$queri);
                          
                            //Menampilkan data dengan perulangan while
                            while ($dt = mysqli_fetch_array($hl)):
                                
                          
                        ?>
                        <tr>
                        <td><?= $no++ ?>.</td>
                            <td><?php echo $dt['id_user'];?></td>
                            <td><?php echo $dt['kode_rak'];?></td>
                            <td><?php echo $dt['kode_brg'];?></td>
                            <td><?php echo $dt['nama_brg'];?></td>
						    <td><?php echo $dt['stok'];?></td>
                            <td><?php echo $dt['tujuan'];?></td>
                            <td><?php echo $dt['tgl'];?></td>
                        </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div>
                <div>

                </main>