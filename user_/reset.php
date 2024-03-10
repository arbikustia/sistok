<?php
	require_once'koneksi.php';
 
	$query = mysqli_query($kon, "INSERT INTO riwayat (id_user,kode_rak,kode_brg,stok,tujuan,tgl) SELECT id_user,kode_rak,kode_brg,stok,tujuan,tgl FROM transaksi");
	// delete transaksi
	$query = mysqli_query($kon, "TRUNCATE transaksi");

	$query = mysqli_query($kon, "DELETE FROM tbl_barang WHERE stok = '0'");
 
	if($query){
		?>
		<script type="text/javascript">
			alert("Berhasil");
			window.location='index.php?halaman=transaksi';
		</script>
		 <?php
	}else{
		?>
		<script type="text/javascript">
			alert("Gagal");
			window.location='index.php?halaman=transaksi';
		</script>
		 <?php
	}
// header("location: index.php?halaman=transaksi");


 
?>