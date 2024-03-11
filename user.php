<style>
.modal-body {
    width: 100%;
}

.container {
    border: 1px solid grey;
    height: auto;
    min-height: 200px;
    width: 1000px;
    display: flex;
    flex-wrap: wrap;
    gap: .5rem;
    padding: 1rem;
}

#checkbox-container {
    margin-bottom: 20px;
    display: grid;
    grid-template-columns: auto auto auto auto auto;
}

.selected-option {
    background-color: blue;
    height: fit-content;
    padding: .3rem;
    color: white;
    border-radius: 1rem;
    text-align: center;
}

.remove-option {
    cursor: pointer;
    color: blue;
    background-color: white;
    border-radius: 100%;
    border: none;
    margin-left: 4px;
}

.modal-box {
    padding: 1rem;
}
</style>

<main>
    <div class="container-fluid px-4 mt-3">
        <h5 class="font-monospace fw-bold">Data User</h5>
        <button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah
            User</button>
        <a href="index.php?halaman=hak_user" class="btn btn-outline-dark btn-sm mt-2">Tambah Hak
            Akses</a>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch demo modal
        </button> -->
        <a class="btn btn-outline-dark btn-sm mt-2" href="index.php?halaman=cek">Cek Hak Akses</a>
        <a class="btn btn-outline-dark btn-sm mt-2" href="index.php?halaman=lok">Lokasi Gudang</a>
        <button class="btn btn-outline-dark btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalLog">Log
            User</button>
    </div>
    <div class="modal-body col-md-8 px-4 mt-3">
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered" cellspacing="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Aktivitas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT * FROM user";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                          
                        ?>
                    <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?php echo $data['id'];?></td>
                        <td><?php echo $data['username'];?></td>
                        <td><?php echo $data['password'];?></td>
                        <td><?php echo $data['level'];?></td>
                        <td>
                            <a class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                        </td>

                    </tr>

                    <!-- Modal Awal Ubah -->
                    <div class="modal fade" id="modalUbah<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="ubah_user.php" method="post">
                                        <div class="form-group">
                                            <label class="col-form-label col-form-label-sm" for="username">ID
                                                User</label>
                                            <input type="text" class="form-control" name="id" value="<?= $data['id']?>"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-form-label-sm"
                                                for="username">Username</label>
                                            <input type="text" class="form-control" value="<?= $data['username']?>"
                                                name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-form-label-sm"
                                                for="username">Password</label>
                                            <input type="text" class="form-control" value="<?= $data['password']?>"
                                                name="pass">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Level</label>
                                            <select data-dselect-search="true" name="level" id="" class="form-select">
                                                <option value="">Pilih Level</option>
                                                <option value="Admin"
                                                    <?php if($data['level']=="Admin") echo 'selected="selected"'; ?>>
                                                    Admin</option>
                                                <option value="Pegawai"
                                                    <?php if($data['level']=="Pegawai") echo 'selected="selected"'; ?>>
                                                    Pegawai</option>
                                            </select>
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
    <!-- modal Hak User -->
    <div class="modal fade " id="modalHak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hak Akses User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-box">
                    <div class="container" id="selected-options"></div>
                    <div id="checkbox-container">
                        <div>
                            <div>
                                <div>Inventory</div>
                                <div>
                                    <input type="checkbox" id="dashboard_inventory" value="dashboard_inventory" />
                                    <label for="dashboard_inventory">Dashboard</label><br />
                                    <input type="checkbox" id="pencarian_barang_inventory"
                                        value="pencarian_barang_inventory" />
                                    <label for="pencarian_barang_inventory">Pencarian Barang</label><br />
                                    <input type="checkbox" id="peringatan_stok_inventory"
                                        value="peringatan_stok_inventory" />
                                    <label for="peringatan_stok_inventory">Peringatan Stok</label><br />
                                    <input type="checkbox" id="tambah_barang_inventory"
                                        value="tambah_barang_inventory" />
                                    <label for="tambah_barang_inventory">Tambah Barang Baru</label><br />
                                    <input type="checkbox" id="barang_masuk_inventory" value="barang_masuk_inventory" />
                                    <label for="barang_masuk_inventory">Barang Masuk</label><br />
                                    <input type="checkbox" id="transfer_barang_inventory"
                                        value="transfer_barang_inventory" />
                                    <label for="transfer_barang_inventory">Teransfer Barang</label><br />
                                    <input type="checkbox" id="layout_rak_inventory" value="layot_rak_inventory" />
                                    <label for="layout_rak_inventory">Layout Nomer Rak</label><br />
                                    <input type="checkbox" id="master_barang_inventory"
                                        value="master_barang_inventory" />
                                    <label for="master_barang_inventory">Master Barang</label><br />
                                </div>
                            </div>
                            <div>
                                <div>TO DO LIST</div>
                                <div>
                                    <input type="checkbox" id="dashboard_inventory" value="dashboard_inventory" />
                                    <label for="option1">Dashboard</label><br />
                                    <input type="checkbox" id="pencarian_barang_inventory"
                                        value="pencarian_barang_inventory" />
                                    <label for="option2">Pencarian Barang</label><br />
                                    <input type="checkbox" id="peringatan_stok_inventory"
                                        value="peringatan_stok_inventory" />
                                    <label for="option3">Peringatan Stok</label><br />
                                    <input type="checkbox" id="tambah_barang_inventory"
                                        value="tambah_barang_inventory" />
                                    <label for="option3">Tambah Barang Baru</label><br />
                                    <input type="checkbox" id="barang_masuk_inventory" value="barang_masuk_inventory" />
                                    <label for="option3">Barang Masuk</label><br />
                                    <input type="checkbox" id="transfer_barang_inventory"
                                        value="transfer_barang_inventory" />
                                    <label for="option3">Teransfer Barang</label><br />
                                    <input type="checkbox" id="layout_rak_inventory" value="layot_rak_inventory" />
                                    <label for="option3">Layout Nomer Rak</label><br />
                                    <input type="checkbox" id="master_barang_inventory"
                                        value="master_barang_inventory" />
                                    <label for="option3">Master Barang</label><br />
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="checkbox" id="option1" value="Option 1" />
                            <label for="option1">Option 1</label><br />
                            <input type="checkbox" id="option2" value="Option 2" />
                            <label for="option2">Option 2</label><br />
                            <input type="checkbox" id="option3" value="Option 3" />
                            <label for="option3">Option 3</label><br />
                        </div>
                        <div>
                            <input type="checkbox" id="option1" value="Option 1" />
                            <label for="option1">Option 1</label><br />
                            <input type="checkbox" id="option2" value="Option 2" />
                            <label for="option2">Option 2</label><br />
                            <input type="checkbox" id="option3" value="Option 3" />
                            <label for="option3">Option 3</label><br />
                        </div>
                        <div>
                            <input type="checkbox" id="option1" value="Option 1" />
                            <label for="option1">Option 1</label><br />
                            <input type="checkbox" id="option2" value="Option 2" />
                            <label for="option2">Option 2</label><br />
                            <input type="checkbox" id="option3" value="Option 3" />
                            <label for="option3">Option 3</label><br />
                        </div>
                        <div>
                            <input type="checkbox" id="option1" value="Option 1" />
                            <label for="option1">Option 1</label><br />
                            <input type="checkbox" id="option2" value="Option 2" />
                            <label for="option2">Option 2</label><br />
                            <input type="checkbox" id="option3" value="Option 3" />
                            <label for="option3">Option 3</label><br />
                        </div>

                    </div>

                    <input type="hidden" id="selected-options-input" name="selectedOptions" />
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
                    <button type="submit" name="BtnSimpan" class="btn btn-primary">Tambah</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php 
                              include 'koneksi.php';

                                                // mengambil kode kelas yg paling besar
                                                $queri = mysqli_query($kon, "SELECT max(id) as kodemax FROM user");
                                                $val = mysqli_fetch_array($queri);
                                                $kode = $val['kodemax'];
                                               
                                                // mengambil angka dari kode kelas terbesar, menggunakan fungsi substr
                                                // dan diubah ke integer dengan (int)
                                                $urutan = (int) substr($kode, 4, 4);
                                               
                                                // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                                                $urutan++;
                                               
                                                $huruf = "user";
                                                $kode = $huruf . sprintf("%03s", $urutan);
                                                
                            ?>
                    <form action="tambah_user.php" method="post">
                        <div class="form-group">
                            <!--<label class="col-form-label col-form-label-sm" for="username">ID User</label>-->
                            <input type="hidden" class="form-control" value="<?php echo $kode ?>" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="username">Username</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="username">Password</label>
                            <input type="text" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="username">Username</label>
                            <select type="text" value="" class="form-select" name="level">
                                <option value="Admin">Admin</option>
                                <option value="Pegawai">Pegawai</option>
                            </select>
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
    <!-- end modal tambah -->
    <!-- Modal Log-->
    <div class="modal fade" id="modalLog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="datatables" class="table table-bordered" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $no = 1;
                            // include database
                            include 'koneksi.php';
                            
                            $sql="SELECT * FROM log_login";
                            
                            $hasil=mysqli_query($kon,$sql);
                          
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):
                                
                          
                        ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?php echo $data['username'];?></td>
                                    <td><?php echo $data['waktu'];?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal log -->






            <script type="text/javascript">
            function setTextField(ddl) {
                document.getElementById('master').value = ddl.options[ddl.selectedIndex].text;
            }
            </script>
            <script>
            const checkboxes = document.querySelectorAll(
                'input[type="checkbox"]'
            );
            const selectedOptionsDiv =
                document.getElementById("selected-options");
            const selectedOptionsForm = document.getElementById(
                "selected-options-form"
            );
            const selectedOptionsInput = document.getElementById(
                "selected-options-input"
            );

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function() {
                    let selected = [];
                    checkboxes.forEach((cb) => {
                        if (cb.checked) {
                            selected.push(cb.value);
                        }
                    });
                    renderSelectedOptions(selected);
                });
            });

            function renderSelectedOptions(selected) {
                selectedOptionsDiv.innerHTML = "";
                selectedOptionsInput.value = selected.join(", ");

                selected.forEach((option) => {
                    const optionDiv = document.createElement("div");
                    optionDiv.classList.add("selected-option");
                    optionDiv.textContent = option;

                    const removeBtn = document.createElement("button");
                    removeBtn.textContent = "x";
                    removeBtn.classList.add("remove-option");
                    removeBtn.addEventListener("click", function() {
                        const index = selected.indexOf(option);
                        if (index > -1) {
                            selected.splice(index, 1);
                            renderSelectedOptions(selected);
                        }
                    });

                    optionDiv.appendChild(removeBtn);
                    selectedOptionsDiv.appendChild(optionDiv);
                });

                if (selected.length === 0) {
                    selectedOptionsDiv.textContent = "No options selected";
                }
            }
            </script>
</main>