<?php

include 'koneksi.php';
//getData 
$get1 = mysqli_query($kon, "SELECT tbl_barang.kode_brg as kode,sum(tbl_barang.stok),notif.kode_brg,notif.max_stok FROM tbl_barang INNER JOIN notif ON tbl_barang.kode_brg=notif.kode_brg GROUP BY notif.kode_brg HAVING sum(tbl_barang.stok) <= max_stok");
$count1 = mysqli_num_rows($get1);

// data jatuh tempo
$get2 = mysqli_query($kon, "SELECT ph.id as id_hutang, ph.tanggal, v.nama_vendor, ph.tglNotif, ph.status, ph.id_user FROM pembayaran_hutang as ph LEFT JOIN vendor as v ON ph.id_vendor=v.id WHERE ph.status='Belum Bayar' AND CURRENT_DATE() > tglNotif order by ph.waktu desc");
$count2 = mysqli_num_rows($get2);

?>
<!-- <style>
    
</style> -->

<style>
.collapse {
    width: 40rem;
}

#layoutSidenav_nav {
    width: 20rem;
    /* Set your desired width here */
    min-width: 20rem;
    background-color: blue;
    /* Ensure a minimum width to prevent content overlap */
}

</style>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu h-3 ">
                <div class="nav">
                    <!--<a class="nav-link" href="index.php">-->
                    <!--    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>-->
                    <!--    Dashboard-->
                    <!--</a>-->


                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                        INVENTORY
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="index.php?halaman=home"><i class="fa-solid fa-house-chimney"></i>&nbsp;Dashboard</a>
                            <a class="nav-link" href="cek_privileges.php?&link=index.php?halaman=cari_brg" value=""><i
                                    class="fas fa-search" aria-hidden="true"></i>&nbsp;Pencarian Barang</a>
                            <a class="nav-link position-relative" href="index.php?halaman=notify"><i class="fas fa-bell"
                                    aria-hidden="true"></i>&nbsp;Peringatan Stok<span
                                    class="top-2 mb-2 badge rounded-pill bg-danger">
                                    <?= $count1; ?>
                                </span></a>
                            <a class="nav-link" href="cek_privileges.php?&link=index.php?halaman=barang_baru"><i
                                    class="fas fa-plus-square" aria-hidden="true"></i>&nbsp;Tambah Barang Baru</a>
                            <a class="nav-link" href="cek_privileges.php?&link=index.php?halaman=barang"><i
                                    class="fas fa-sign-in" aria-hidden="true"></i>&nbsp;Barang Masuk</a>
                            <!--<a class="nav-link" href="cek_privileges.php?&link=index.php?halaman=histori"><i class="fas fa-history" aria-hidden="true"></i>&nbsp;Riwayat In</a>-->
                            <a class="nav-link" href="cek_privileges.php?&link=index.php?halaman=transaksi"><i
                                    class="fas fa-sign-out" aria-hidden="true"></i>&nbsp;Transfer Barang</a>
                            <!--<a class="nav-link" href="index.php?halaman=transfer"><i class="fas fa-exchange" aria-hidden="true"></i>&nbsp;Transfer Antar RAK</a>-->
                            <a class="nav-link" href="cek_privileges.php?&link=index.php?halaman=rak"><i
                                    class="fas fa-cart-plus" aria-hidden="true"></i>&nbsp;Layout Nomor Rak</a>
                            <a class="nav-link" href="cek_privileges.php?&link=index.php?halaman=master"><i
                                    class="fas fa-file" aria-hidden="true"></i>&nbsp;Master Barang</a>
                            <!--<a class="nav-link" href="cek_privileges.php?&link=index.php?halaman=user"><i class="fas fa-users" aria-hidden="true"></i>&nbsp;Data User</a>-->
                        </nav>
                    </div>
                </div>
                <div class="nav">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayout"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        TO DO LIST
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayout" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="index.php?halaman=toDoList"><i
                                    class="fa-solid fa-plus"></i>&nbsp;Upload Produk</a>
                            <!--<a class="nav-link" href="index.php?halaman=toko"><i class="fa-solid fa-gear"></i>&nbsp;Master Toko</a>-->
                            <!--<a class="nav-link position-relative" href="index.php?halaman=market_place"><i class="fa-solid fa-gear" aria-hidden="true"></i>&nbsp;Master Market place</a>-->
                        </nav>
                    </div>
                    <div class="nav">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayoutt" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-plus"></i></div>
                            KOMPLAIN/REFUND
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayoutt" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <!-- <a class="nav-link" href="index.php?halaman=komplain"><i class="fa-solid fa-plus"></i>&nbsp;Tambah Komplain</a> -->
                                <a class="nav-link" href="index.php?halaman=dashboard_komplain"><i class="fa-solid fa-house-chimney"></i>&nbsp;Dashboard</a>
                                <a class="nav-link" href="index.php?halaman=pencarian_komplain_refund"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Pencarian Komplain</a>
                                <a class="nav-link" href="index.php?halaman=peringatan_komplain"><i class="fa-solid fa-bell"></i>&nbsp;Peringatan Komplain</a>
                                <a class="nav-link" href="index.php?halaman=komplain"><i class="fa-solid fa-plus"></i>&nbsp;Tambah Komplain / REFUND</a>
                                <!-- <a class="nav-link" href="index.php?halaman=toko"><i class="fa-solid fa-gear"></i>&nbsp;Master Toko</a> -->
                                <!-- <a class="nav-link position-relative" href="index.php?halaman=market_place"><i class="fa-solid fa-gear" aria-hidden="true"></i>&nbsp;Master Market place</a> -->
                            </nav>
                        </div>
                        <div class="nav">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#hutang-vendor" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-check-dollar"></i></div>
                                PEMBAYARAN HUTANG VENDOR
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="hutang-vendor" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?halaman=dashboard_pembayaran"><i class="fa-solid fa-house-chimney"></i>&nbsp;Dashboard</a>
                                    <!-- <a class="nav-link" href="index.php?halaman=pencarian_komplain"><i class="fa-solid fa-magnifying-glass-dollar"></i>&nbsp;Pencarian</a> -->
                                    <a class="nav-link position-relative" href="index.php?halaman=jatuh_tempo"><i class="fa-solid fa-credit-card"></i>&nbsp;Pembayaran Jatuh Tempo<span
                                    class="top-2 mb-2 badge rounded-pill bg-danger">
                                    <?= $count2; ?>
                                </span></a>
                                    <a class="nav-link position-relative" href="index.php?halaman=tambah_pembayaran"><i class="fa-solid fa-square-plus"></i>&nbsp;Tambah Pembayaran</a>
                                </nav>
                            </div>
                        </div>

                        <div class="nav">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#expedisi"
                                aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-plane"></i></div>
                                EKSPEDISI CHINA - INDONESIA
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="expedisi" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?halaman=e_dashboard"><i class="fa-solid fa-house-chimney"></i>&nbsp;Dashboard</a>
                                    <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass-dollar"></i>&nbsp;Pencarian Ekspedisi</a>
                                    <a class="nav-link position-relative" href="index.php?halaman=e_jatuh_tempo"><i class="fa-solid fa-credit-card"></i>&nbsp;Pembayaran Jatuh Tempo
                                </a>
                                    <a class="nav-link position-relative" href="index.php?halaman=e_pembayaran"><i class="fa-solid fa-square-plus"></i>&nbsp;Tambah Pembayaran</a>
                                </nav>
                            </div>
                        </div>

                        <div class="nav">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#setting"
                                aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                                PENGATURAN
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="setting" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?halaman=user"><i
                                            class="fa fa-user"></i>&nbsp;Master User</a>
                                    <a class="nav-link" href="index.php?halaman=toko"><i
                                            class="fa-solid fa-shop"></i>&nbsp;Master Toko</a>
                                    <a class="nav-link position-relative" href="index.php?halaman=market_place"><i
                                            class="fa-solid fa-bag-shopping"></i>&nbsp;Master Market place</a>
                                    <a class="nav-link position-relative" href="index.php?halaman=vendor"><i
                                            class="fa-regular fa-handshake"></i>&nbsp;Master Vendor</a>
                                    <a class="nav-link position-relative" href="index.php?halaman=ekspedisi"><i
                                            class="fa-solid fa-car-side"></i>&nbsp;Master Ekspedisi</a>
                                    <a class="nav-link position-relative" href="index.php?halaman=perusahaan"><i
                                            class="fa-solid fa-building-columns"></i>&nbsp;Master Perusahaan</a>
                                </nav>
                            </div>
                        </div>

        </nav>


    </div>
    <div id="layoutSidenav_content">