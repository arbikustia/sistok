
<main>
    <div class="container-fluid px-4 mt-3">
        <h5 class="font-monospace fw-bold">History Pembayaran</h5>
        <a class="btn btn-sm btn-dark" href="index.php?halaman=dashboard_pembayaran">Kembali</a>

        <div class="modal-body col-md-12 mt-3">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered" cellspacing="1">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Vendor</th>
                        <th>Tanggal</th>
                        <th>Notification</th>
                        <th>Status</th>
                        <th>Diperbaharui Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $no = 1;
                              // include database
                              include 'koneksi.php';
                              $sql="SELECT * FROM pembayaran_hutang as ph LEFT JOIN vendor as v ON ph.id_vendor=v.id WHERE status='Sudah Bayar';";                            
                              $hasil=mysqli_query($kon,$sql);                     
                              //Menampilkan data dengan perulangan while
                              while ($data = mysqli_fetch_array($hasil)):      
                          ?>
                        <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $data['tanggal1'];?></td>
                        <td><?= $data['nama_vendor'];?></td>
                        <td><?= $data['tanggal2'];?></td>
                        <td><?= $data['tglNotif'];?></td>
                        <td><?php if($data['status'] == 'Belum Bayar'){ echo '<span class="rounded-pill badge bg-danger">Belum Bayar</span>';}else{echo '<span class="rounded-pill badge bg-success">Sudah Bayar</span>'; } ?></td>
                        <td><?= $data['id_user'];?></td>
                        </tr>                   

                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
    <div>


      

   </div>
</main>