<?php
include 'koneksi.php';


//getData pembayaran selesai
$get1 = mysqli_query($kon, "SELECT * FROM pembayaran_hutang as ph LEFT JOIN vendor as v ON ph.id_vendor=v.id WHERE status='Sudah Bayar'");
$count1 = mysqli_num_rows($get1); // hitung koloam

//getData semua pembayaran
$get2 = mysqli_query($kon, "SELECT * FROM pembayaran_hutang as ph LEFT JOIN vendor as v ON ph.id_vendor=v.id");
$count2 = mysqli_num_rows($get2); // hitung kolom

//getData pembayaran belum selesai
$get3 = mysqli_query($kon, "SELECT * FROM pembayaran_hutang as ph LEFT JOIN vendor as v ON ph.id_vendor=v.id WHERE status='Belum Bayar'");
$count3 = mysqli_num_rows($get3); // hitung kolom

//getData Total user
$get4 = mysqli_query($kon, "SELECT * FROM pembayaran_hutang as ph LEFT JOIN vendor as v ON ph.id_vendor=v.id");
$count4 = mysqli_num_rows($get4); // hitung kolom
?>
<div class="container-fluid px-4">
                                     <?php
                                    if(isset($_GET['pesan'])){
                                    ?>
                                    <div class="alert alert-danger d-flex align-items-center mt-2" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <div>
                                    <?php echo $_GET['pesan']; ?>
                                    </div>
                                    </div>
                                    <?php } ?>
                        <h3 class="mt-4">Dashboard</h3>
                        <?php 
                       
                    
                        $tz = 'Asia/Jakarta';
                        $dt = new DateTime("now", new DateTimeZone($tz));
                        $timestamp = $dt->format('Y-m-d G:i');
                        echo "$timestamp \n";
                        
                        ?>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body text-center fw-bold">PEMBAYARAN SELESAI</div>
                                    <h2 class="text-center"><?= $count1 ?></h2>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?halaman=history_bayar">Selengkapnya</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body text-center fw-bold">PEMBAYARAN JATUH TEMPO</div>
                                    <h2 class="text-center"><?=$count2; ?></h2>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?halaman=jatuh_tempo">Selengkapnya</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body text-center fw-bold">PEMBAYARAN BELUM SELESAI</div>
                                    <h2 class="text-center"><?=$count3; ?></h2>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?halaman=history_belum_bayar">Selengkapnya</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body text-center fw-bold">SEMUA PEMBAYARAN</div>
                                    <h2 class="text-center"><?=$count4; ?></h2>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?halaman=tambah_pembayaran">Selengkapnya</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>