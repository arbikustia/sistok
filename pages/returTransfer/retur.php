     
<main>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
    <!-- datetimepicker jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    
       
<div class="container-fluid">
                      
                          <form action="action/tambah/tambah_retur.php" name="myForm" method="POST" enctype="multipart/form-data">
                         <div class="row">
                          <div class="col-sm-3">
                          <label class="col-form-label col-form-label-sm" for="username">ID Transaksi</label>
                          <input type="text" class="form-control" name="id" required>
                          </div>
                          <div class="col-sm-3">
                         <label class="col-form-label col-form-label-sm" for="username">SKU</label>
                          <input type="text" class="form-control" name="kode" required>
                          </div>
                          </div>
                        <div class="row">
                          <div class="col-sm-3">
                          <label class="col-form-label col-form-label-sm" for="username">Qty</label>
                          <input type="text" class="form-control" name="qty" required>
                          </div>
                            <div class="col-sm-3">
                          <label class="col-form-label col-form-label-sm" for="username">Tanggal</label>
                          <input type="" class="form-control tgl" name="tgl">
                          </div>
                          </div>
                          <div class="col-sm-3">
                          <label class="col-form-label col-form-label-sm" for="username">catatan</label>
                          <input type="text" class="form-control" name="catatan">
                          </div>
                          <div class="">
                            <button type="submit" name="BtnSimpan" class="btn btn-success mt-2">Kirim Retur</button>
                           
                            </form>
                            </div>
                   
                    <script>
                    $(".tgl").datetimepicker({
                    format : 'Y-m-d H:i',
                    formatTime : 'H:i',
                    formatDate : 'Y-m-d',
                    step: 1
                     });
                    </script>
                    </main>
                   
                    
        
