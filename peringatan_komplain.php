<style>
.modal-body {
    width: 100%;
}
</style>

<main>
    <div class="container-fluid px-4 mt-3">
        <h5 class="font-monospace fw-bold">Peringatan Komplain</h5>
        <!-- <a class="btn btn-primary btn-sm" href="index.php?halaman=add_notif">Tambah Peringatan Stok</a> -->


        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="tambah_notif.php" method="post">
                            <div class="col">
                                <label class="form-label" for="">SKU</label>
                                <select data-dselect-search="true" name="kode" id="dselect3" class="form-select">
                                    <option value="">Pilih</option>
                                    <?php  
                              include "koneksi.php";
                              //query menampilkan nama unit kerja ke dalam combobox
                              $query = mysqli_query($kon, "SELECT kode_brg FROM master_brg");
                              while ($data = mysqli_fetch_array($query)) {
                              ?>
                                    <option value="<?= $data['kode_brg'] ?>"><?= $data['kode_brg']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="col-form-label col-form-label-sm" for="username">Peringatan Stok</label>
                                <input type="text" class="form-control" name="stokk">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="BtnSimpan" class="btn btn-danger">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="modal-body col-md-6 mt-3">
                <div class="table-responsive">
                    <table id="tabledet" class="table table-bordered" cellspacing="1">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Marketplace</th>
                                <th>No Pesanan</th>
                                <th>Nama Pembeli</th>
                                <th>Nama Produk / SKU</th>
                                <th>Harga</th>
                                <th>QTY</th>
                                <th>Jumlah Refund </th>
                                <th>Permasalahan </th>
                                <th>Status </th>
                                <th>Notifikasi </th>
                                <th>Aktivitas </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                                // include database
                                include 'koneksi.php';
                                
                                $sql="SELECT tbl_barang.kode_brg as kode,sum(tbl_barang.stok) as stokk,notif.kode_brg,notif.max_stok FROM tbl_barang INNER JOIN notif ON tbl_barang.kode_brg=notif.kode_brg GROUP BY notif.kode_brg HAVING sum(tbl_barang.stok) <= max_stok";
                                
                                $hasil=mysqli_query($kon,$sql);
                                
                                //Menampilkan data dengan perulangan while
                                while ($data = mysqli_fetch_array($hasil)):
                            ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data['kode'];?></td>
                                <td><?= $data['stokk'];?></td>
                                <td><?= $data['max_stok'];?></td>
                                <td><?= $data['max_stok'];?></td>
                                <td><?= $data['max_stok'];?></td>
                                <td><?= $data['max_stok'];?></td>
                                <td><?= $data['max_stok'];?></td>
                                <td><?= $data['max_stok'];?></td>
                                <td><?= $data['max_stok'];?></td>
                                <td><?= $data['max_stok'];?></td>
                                <td><?= $data['max_stok'];?></td>
                               


                            </tr>

                            <!-- Modal Awal Hapus -->
                            <div class="modal fade" id="modalHapus<?= $no ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <form action="hapus_notif.php" method="post">
                                                    <input type="hidden" class="form-control" name="kode"
                                                        value="<?= $data['kode']?>">
                                                    <h6 class="text-center">Apakah anda yakin akan menghapus <span
                                                            class="text-danger"><?= $data['kode']?></span> ? <br></h6>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="BtnHapus" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal akhir hapus -->

                            <!-- Modal Awal Ubah -->
                            <div class="modal fade" id="modalUbah<?= $no ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="ubah_notif.php" method="post">
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="col-form-label col-form-label-sm"
                                                            for="username">SKU</label>
                                                        <input type="text" class="form-control" name="kode"
                                                            value="<?= $data['kode_brg']?>" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label class="col-form-label col-form-label-sm"
                                                            for="username">Peringatan Stok</label>
                                                        <input type="text" class="form-control"
                                                            value="<?= $data['max_stok']?>" name="maxStok">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="BtnEdit" class="btn btn-danger">Ubah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Akhir Ubah -->


                            <?php endwhile; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        <div>

            <!-- DataTables -->
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" crossorigin="anonymous">
            </script>
            <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" crossorigin="anonymous">
            </script>
            <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

            <script>
            $('#tabledet').DataTable({
                "bFilter": true,
                //   scrollY :'400px',
            });
            </script>




        </div>
</main>