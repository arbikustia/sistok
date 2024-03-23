
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

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
<!-- datetimepicker jQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
</script>




<style>
.modal-body {
    /* background-color: red; */
    width: 100%;
    display: flex;
    flex-direction: column;
    /* gap: 3rem; */
}

.modal-body form {
    display: flex;
    flex-direction: column;
    gap: .5rem;
}

.notif {
    cursor: pointer;
}

.tgl {
    background-color: transparent;
}


.quesadilla {
    position: relative;
}

.quesadilla input[type="date"] {
    padding-right: 30px;
    /* Adjust padding to accommodate the custom icon */
}

#customDateIcon {
    position: absolute;
    top: 50%;
    right: 10px;
    /* Adjust the position of the custom icon */
    transform: translateY(-50%);
    cursor: pointer;
    z-index: 1;
    /* Ensure the custom icon is above the input */
}

.enchilada::-webkit-calendar-picker-indicator {
    display: none;
    /* Hide the default calendar icon */
}

.form_komplain {
    display: grid;
    grid-template-columns: auto auto auto auto auto;
    gap: 1rem;
    padding-top: 1rem;
}

.modal-footer {
    display: flex;
    flex-direction: row;
    gap: 1rem;
    justify-content: end;
    align-items: flex-end;
}

#formTambah {
    display: none;
}
#formEdit {
    display: none;
}
</style>

<main>
    <div class="container-fluid px-4 mt-3">
        <h5 class="font-monospace fw-bold">Peringatan Komplain</h5>
        <!-- <a class="btn btn-primary btn-sm" href="index.php?halaman=add_notif">Tambah Peringatan Stok</a> -->
        <button class=" btn btn-primary btn-sm" id="btn-form">Tambah</button>
        <form class="form_komplain" id="formTambah" action="action/tambah/tambah_komplain.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" class="form-control" id="exampleInputEmail1" name="tgl" aria-describedby="emailHelp"
                    placeholder="Tanggal">
            </div>
            <div class="form-group">
                <label class="col-form-label col-form-label-sm">Marketplace</label>
                <select data-dselect-search="true" name="marketplace" id="dselect3" class="form-select" required>
                    <option value="">Pilih</option>
                    <?php  
                    include "koneksi.php";
                    //query menampilkan nama unit kerja ke dalam combobox
                    $query = mysqli_query($kon, "SELECT * FROM market_place");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama_market']?></option>
                    <?php } ?>
                </select>
                </div>
            <div class="form-group">
                <label for="exampleInputPassword1">No Pesanan</label>
                <input type="text" name="pesanan" class="form-control" id="exampleInputPassword1"
                    placeholder="No Pesanan">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputPassword1"
                    placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Produk Refund</label>
                <input type="text" name="refund" class="form-control" id="exampleInputPassword1"
                    placeholder="Produk Refund">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">SKU</label>
                <input type="text" name="sku" class="form-control" id="exampleInputPassword1" placeholder="SKU">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Harga</label>
                <input type="number" name="harga" class="form-control" id="exampleInputPassword1"
                    placeholder="Harga">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">QTY</label>
                <input type="number" name="qty" class="form-control" id="exampleInputPassword1" placeholder="QTY">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Jumlah Refund</label>
                <input type="number" name="jumlah" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Refund">
            </div>
            <div class="form-group">
                <label class="col-form-label col-form-label-sm" for="username">Permasalahan</label>
                <select type="text" value="" class="form-select" name="masalah">
                    <option value="Barang Kosong">Barang Kosong</option>
                    <option value="Tidak Terkirim">Tidak Terkirim</option>
                    <option value="Salah Kirim">Salah Kirim</option>

                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label col-form-label-sm" for="username">Status</label>
                <select type="text" value="" class="form-select" name="status">
                    <option value="Belum Selesai">Belum Selesai</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
            <div class="form-group">
                <label class="notif" for="tgl">Notification <i class="fa-solid fa-bell"></i></label>
                <input type="" class="tgl form-control " id="tgl" name="tglNotif">
            </div>
            <div></div>
            <div></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close-form">Batal</button>
                <button type="submit" name="BtnSimpan" class="btn btn-primary">Simpan</button>
            </div>
        </form>

        <!-- form ubah start-->
        <form class="form_komplain" id="formEdit">
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Tanggal">
            </div>
            <div class="form-group">
                <label class="col-form-label col-form-label-sm" for="username">Marketplace</label>
                <select type="text" value="" class="form-select" name="level">
                    <option value="Admin">Vendor 1</option>
                    <option value="Pegawai">Vendor 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">No Pesanan</label>
                <input type="number" min="2" max="2" class="form-control" id="exampleInputPassword1"
                    placeholder="No Pesanan">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Username</label>
                <input type="text" min="2" max="2" class="form-control" id="exampleInputPassword1"
                    placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Produk Refund</label>
                <input type="text" min="2" max="2" class="form-control" id="exampleInputPassword1"
                    placeholder="Produk Refund">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">SKU</label>
                <input type="text" min="2" max="2" class="form-control" id="exampleInputPassword1" placeholder="SKU">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Harga</label>
                <input type="number" min="2" max="2" class="form-control" id="exampleInputPassword1"
                    placeholder="Harga">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">QTY</label>
                <input type="number" min="2" max="2" class="form-control" id="exampleInputPassword1" placeholder="QTY">
            </div>
            <div class="form-group">Jumlah Refund</label>
                <input type="number" min="2" max="2" class="form-control" id="exampleInputPassword1"
                    placeholder="Jumlah Refund">
            </div>
            <div class="form-group">Status</label>
                <input type="text" min="2" max="2" class="form-control" id="exampleInputPassword1" placeholder="Status">
            </div>

            <div class="form-group">
                <label class="notif" for="tgl">Notification <i class="fa-solid fa-bell"></i></label>
                <input type="" class="tgl form-control " id="tgl" name="tgl">
            </div>

            <div class="form-group">Aktivitas</label>
                <input type="text" min="2" max="2" class="form-control" id="exampleInputPassword1"
                    placeholder="Aktivitas">
            </div>
            <div></div>
            <div></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close-edit">Batal</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
<!-- form ubah end -->

        <div class="modal-body col-md-6 mt-3">
            <div class="table-responsive">
                <table id="tabledet" class="table table-bordered" cellspacing="1">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Marketplace</th>
                            <th>No Pesanan</th>
                            <th>Username</th>
                            <th>Produk Refund</th>
                            <th>SKU</th>
                            <th>Harga</th>
                            <th>QTY </th>
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

                        $sql = "SELECT tbl_barang.kode_brg as kode,sum(tbl_barang.stok) as stokk,notif.kode_brg,notif.max_stok FROM tbl_barang INNER JOIN notif ON tbl_barang.kode_brg=notif.kode_brg GROUP BY notif.kode_brg HAVING sum(tbl_barang.stok) <= max_stok";

                        $hasil = mysqli_query($kon, $sql);

                        //Menampilkan data dengan perulangan while
                        while ($data = mysqli_fetch_array($hasil)):
                            ?>
                        <tr>
                            <td>
                                <?= $no++ ?>.
                            </td>
                            <td>
                                <?= $data['kode']; ?>
                            </td>
                            <td>
                                <?= $data['stokk']; ?>
                            </td>
                            <td>
                                <?= $data['max_stok']; ?>
                            </td>
                            <td>
                                <?= $data['max_stok']; ?>
                            </td>
                            <td>
                                <?= $data['max_stok']; ?>
                            </td>
                            <td>
                                <?= $data['max_stok']; ?>
                            </td>
                            <td>
                                <?= $data['max_stok']; ?>
                            </td>
                            <td>
                                <?= $data['max_stok']; ?>
                            </td>
                            <td>
                                <?= $data['max_stok']; ?>
                            </td>
                            <td>
                                <?= $data['max_stok']; ?>
                            </td>
                            <td>
                                <?= $data['max_stok']; ?>
                            </td>
                            <td><button id="btn-edit" class="btn btn-warning btn-sm" >Ubah</button>|
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalHapus<?= $no ?>">Hapus</button>
                            </td>


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
                                                    value="<?= $data['kode'] ?>">
                                                <h6 class="text-center">Apakah anda yakin akan menghapus <span
                                                        class="text-danger">
                                                        <?= $data['kode'] ?>
                                                    </span> ? <br></h6>
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
                                                        value="<?= $data['kode_brg'] ?>" readonly>
                                                </div>
                                                <div class="col">
                                                    <label class="col-form-label col-form-label-sm"
                                                        for="username">Peringatan Stok</label>
                                                    <input type="text" class="form-control"
                                                        value="<?= $data['max_stok'] ?>" name="maxStok">
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
        <script>
        document.getElementById('btn-form').addEventListener('click', function() {
            document.getElementById('formTambah').style.display =
                'grid'; // Open the date picker when the icon is clicked
        });
        document.getElementById('close-form').addEventListener('click', function() {
            document.getElementById('formTambah').style.display =
                'none'; // Open the date picker when the icon is clicked
        });
        document.getElementById('btn-edit').addEventListener('click', function() {
            document.getElementById('formEdit').style.display =
                'grid'; // Open the date picker when the icon is clicked
        });
        document.getElementById('close-edit').addEventListener('click', function() {
            document.getElementById('formEdit').style.display =
                'none'; // Open the date picker when the icon is clicked
        });
        $('#tabledet').DataTable({
            "bFilter": true,
            //   scrollY :'400px',
        });


        var maxDate = new Date();
        maxDate.setDate(maxDate.getDate() + 7);



        $(".tgl").datetimepicker({
            format: 'Y-m-d',
            formatDate: 'Y-m-d',
            step: 1,
            timepicker: false, // Disables timepicker
            minDate: 0, // Today
            maxDate: maxDate, // 7 days from today
        });
        </script>




</main>