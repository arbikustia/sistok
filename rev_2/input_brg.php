<main>
<div class="container-fluid px-4 mt-3">
<h5  class="font-monospace fw-bold">Tambah Data Barang</h5>

<form action="" method="POST" enctype="multipart/form-data">
                          <label class="form-label" for="">Kode Barang</label>
                          <div class="col-sm-4">
                            <input type="text" name="id" placeholder="Enter" class="form-control-sm text-uppercase">
                            <button class="btn btn-primary btn-sm" name="cari"  type="submit" id="button-addon2">Cari Barang</button>
                          </div>
</form>

   <?php 
   $conn = mysqli_connect("localhost","sistokmy_rott","@Adeputri99");
    
   $db = mysqli_select_db($conn,'sistokmy_sistok');

   if (isset($_POST['cari'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM master_brg where kode_brg='$id'";
    $query_run = mysqli_query($conn,$query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
        ?>
        <form action="addbrg.php" method="POST" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-sm-4">
                              <label class="form-label" for="username">Kode Barang</label>
                              <input type="text" value="<?= $row['kode_brg'] ?>" class="form-control" name="kode" readonly>
                            </div>
                            <div class="col-sm-4">
                              <label class="form-label" for="username">Nama Barang</label>
                              <input type="text" value="<?= $row['nama_brg'] ?>" class="form-control" name="nama" readonly>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-4">
                         <label for="Image" class="form-label">Foto</label>
                          <input class="form-control" type="text" value="<?= $row['foto_brg'] ?>" name="foto" readonly>
                          </div>
                            <div class="col-sm-4">
                              <label class="form-label" for="">Satuan</label>
                              <input type="text" name="satuan" value="<?= $row['satuan'] ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                            <label class="form-label" for="">Kode Rak</label>
                              <select data-dselect-search="true" name="rak" id="dselect3" class="form-select">
                            <option value="">Pilih Rak</option>
                            <?php  
                            include "koneksi.php";
                            //query menampilkan nama unit kerja ke dalam combobox
                            $query = mysqli_query($kon, "SELECT * FROM tb_rak");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?= $data['NO_RAK'] ?>"><?= $data['NO_RAK']?></option>
                            <?php } ?>
                            </select>
                            </div>
                           <div class="col-sm-4">
                          <label for="" class="form-label">Stok</label>
                          <input class="form-control" type="number" name="stok">
                         </div>
                         </div>
                         <div class="row">
                        <div class="col-sm-4">
                          <label class="col-form-label col-form-label-sm" for="username">Tanggal</label>
                          <input type="datetime-local" class="form-control" name="tgl">
                          </div>
                          <div class="col-sm-4">
                          <label class="col-form-label col-form-label-sm" for="username">catatan</label>
                          <input type="text" class="form-control" name="catatan">
                          </div>
                          </div>
                       

                          <button type="submit" name="BtnSimpan" class="btn btn-primary btn-sm mt-3">Tambah Data</button>
        </form>


        <?php 
     }
   }
   else
   {
       echo "Barang Tidak Ditemukan !";
   }
}
   ?>

</div>
</main>