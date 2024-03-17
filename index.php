<?php
    session_start();
    error_reporting(0);
    if(empty($_SESSION['username'])){
        header('location:pages/login/login.php');
    }
    
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Dashboard HELLOMO</title>

    <!-- css searchbox dropdown -->

    <link rel="stylesheet" href="css/dselect.css">

    <!--<script src="js/virtual-select.min.js"></script>-->
    <!-- <link rel="stylesheet" href="css/virtual-select.min.css">-->

    <link rel="stylesheet" href="dist/virtual-select.min.css" />
    <script src="dist/virtual-select.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- css datatables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

    <style>
    .table.dataTable {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 12px;
    }

    #sidebarToggle {
        margin: 0 0 0 4rem;

    }

    #page-wrapper {
        margin-left: 6rem;
    }
    </style>

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Welcome <?=$_SESSION['id']?></a>
        <!-- Sidebar Toggle-->

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <ul class="navbar-nav ms-auto ms-md-12 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><?=$_SESSION['username']?><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php?halaman=password">Ganti Password</a></li>
                    <li><a class="dropdown-item" href="action/login/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <?php
            include('sidebar/admin.php'); 
        ?>
    <div id="page-wrapper">
        <div id="page-inner">
            <?php
					if(isset($_GET["halaman"])){
						if($_GET["halaman"] == "barang"){
							include 'barang.php';
						}elseif($_GET["halaman"] == "transaksi"){
							include 'tabs.php';
						}elseif($_GET["halaman"] == "rak"){
							include 'rak.php';
						}elseif($_GET["halaman"] == "history"){
							include 'history.php';
						}elseif($_GET["halaman"] == "password"){
							include 'ganti_pass.php';
						}elseif($_GET["halaman"] == "input"){
							include 'input_brg.php';
						}elseif($_GET["halaman"] == "master"){
							include 'master_brg.php';
						}elseif($_GET["halaman"] == "barang_baru"){
							include 'barang_baru.php';
						}elseif($_GET["halaman"] == "histori"){
							include 'histori.php';
						}elseif($_GET["halaman"] == "transfer"){
							include 'transfer_rak.php';
						}elseif($_GET["halaman"] == "cari_brg"){
							include 'cari_brg.php';
						}elseif($_GET["halaman"] == "user"){
							include 'user.php';
						}elseif($_GET["halaman"] == "home"){
							include 'home.php';
						}elseif($_GET["halaman"] == "cek"){
							include 'cek_hak.php';
						}elseif($_GET["halaman"] == "lok"){
							include 'lokasi.php';
						}elseif($_GET["halaman"] == "detail"){
							include 'detail_trans_dijalan.php';
						}elseif($_GET["halaman"] == "notify"){
							include 'notifikasi.php';
						} elseif($_GET["halaman"] == "barang_detail"){
							include 'detail_brg.php';
						}elseif($_GET["halaman"] == "add_notif"){
							include 'add-notif.php';
						}elseif($_GET["halaman"] == "toDoList"){
							include 'toDoList.php';
						} elseif($_GET["halaman"] == "toko"){
                            include 'toko.php';
                        }elseif($_GET["halaman"] == "market_place"){
                            include 'market_place.php';
					    }elseif($_GET["halaman"] == "komplain"){
                            include 'komplain.php';
                        }elseif($_GET["halaman"] == "dashboard_pembayaran"){
                            include 'pages/pembayaranHutang/dashboard_pembayaran.php';
                        }elseif($_GET["halaman"] == "pencarian_komplain"){
                            include 'pencarian_komplain.php';
                        }elseif($_GET["halaman"] == "jatuh_tempo"){
                            include 'pages/pembayaranHutang/jatuh_tempo.php';
                        }elseif($_GET["halaman"] == "tambah_pembayaran"){
                            include 'pages/pembayaranHutang/pembayaran_hutang.php';
                        }elseif($_GET["halaman"] == "hak_user"){
                            include 'hak_user.php';
                        }elseif($_GET["halaman"] == "vendor"){
                            include 'vendor.php';
                	    }elseif($_GET["halaman"] == "pencarian_komplain_refund"){
                            include 'pencarian_komplain_refund.php';
                        }elseif($_GET["halaman"] == "dashboard_komplain"){
                            include 'dashboard_komplain.php';
                        }elseif($_GET["halaman"] == "perusahaan"){
                            include 'perusahaan.php';
                        }elseif($_GET["halaman"] == "peringatan_komplain"){
                            include 'peringatan_komplain.php';
                        }elseif($_GET["halaman"] == "ekspedisi"){
                            include 'ekspedisi.php';
                        }elseif($_GET["halaman"] == "history_bayar"){
                            include 'pages/pembayaranHutang/historyBayarHutang.php';
                        }elseif($_GET["halaman"] == "history_belum_bayar"){
                            include 'pages/pembayaranHutang/historyBelumBayar.php';
                        }elseif($_GET["halaman"] == "e_dashboard"){
                            include 'pages/ekspedisiChinaIDN/e_dashboard.php';
                        }elseif($_GET["halaman"] == "e_pembayaran"){
                            include 'pages/ekspedisiChinaIDN/e_pembayaran.php';
                        }elseif($_GET["halaman"] == "e_jatuh_tempo"){
                            include 'pages/ekspedisiChinaIDN/e_pembayaran_jatuh_tempo.php';
                        }else{
						   include 'home.php';
					}
                }
				?>
        </div>
    </div>

    <!-- akhir konten -->
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-end small">
                <div class="text-muted">HELLOMO &copy; Sistem Informasi Toko 2024</div>
            </div>
        </div>
    </footer>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>

    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


    <!-- Search Box Dropdown -->
    <script src="js/dselect.js"></script>
    <!--<script src="js/dst.js"></script>-->
    <script src="js/select2.js"></script>
    <script src="js/select3.js"></script>
    <script src="js/select.js"></script>
    <script src="js/select4.js"></script>

    <script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable({
            "bFilter": false,
            scrollY: '300px',
        });
    });
    $(document).ready(function() {
        $('#datatables').DataTable({
            "bFilter": false,
            // scrollY: '300px',
        });

    });
    $(document).ready(function() {
        $('#myTable').DataTable({

            // scrollY :'300px',  
        });

    });
    $(document).ready(function() {
        $('#tablerak').DataTable({
            "bFilter": false,
            scrollY: '300px',
        });

    });
    $(document).ready(function() {
        $('#table_detail').DataTable({
            "bFilter": true,
            scrollY: '300px',
        });

    });


    $(document).ready(function() {
        $('#tabletrans').DataTable({
            "bFilter": false,
        });

    });
    </script>
</body>

</html>