<?php
    session_start();
    error_reporting(0);
    if(empty($_SESSION['level']=="Admin")){
        header('location:login.php?pesan=Anda Bukan Admin !');
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
        <title>Dashboard Admin</title>
        <!-- css searchbox dropdown -->
        <link rel="stylesheet" href="css/dselect.css">
        <!-- css datatables -->
       <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

       <style>
        .table.dataTable  {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 13px;
        }
        </style>

        <!-- bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Welcome <?=$_SESSION['id']?></a>
            <!-- Sidebar Toggle-->

            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
            <ul class="navbar-nav ms-auto ms-md-12 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$_SESSION['level']?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?halaman=password">Ganti Password</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php
            include('sidebar/admin.php'); 
        ?>   
    <div id="page-wrapper" >
			<div id="page-inner">
				<?php
					if(isset($_GET["halaman"])){
						if($_GET["halaman"] == "barang"){
							include 'barang.php';
						}
						elseif($_GET["halaman"] == "rak"){
							include 'rak.php';
						}
						elseif($_GET["halaman"] == "history"){
							include 'history.php';
						}
						elseif($_GET["halaman"] == "password"){
							include 'ganti_pass.php';
						}
						elseif($_GET["halaman"] == "input"){
							include 'input_brg.php';
						}
                        elseif($_GET["halaman"] == "master"){
							include 'master_brg.php';
						}
						 elseif($_GET["halaman"] == "barang_baru"){
							include 'barang_baru.php';
						}
                        elseif($_GET["halaman"] == "user"){
							include 'user.php';
						}

					}
					else{
						include 'home.php';
					}
				?>                        
			</div>
    </div>

    <!-- akhir konten -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sistem Informasi Toko 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

       

     
    
 
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
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
        <script src="js/select2.js"></script>
        <script src="js/select3.js"></script>
        <script src="js/select.js"></script>

        <script>

          $(document).ready(function() {
            $('#datatablesSimple').DataTable( {
                "bFilter" : false, 
              //scrollY :'300px',  
        } );
        $(document).ready(function() {
            $('#datatables').DataTable( {
                "bFilter" : false, 
             // scrollY :'300px',  
        } );

      } );
      $(document).ready(function() {
            $('#myTable').DataTable( {
                
             // scrollY :'300px',  
        } );

      } );
        $(document).ready(function() {
            $('#tablerak').DataTable( {
             "bFilter" : false,  
        } );

      } );
    } );
        </script>


        




       

        
    </body>
</html>