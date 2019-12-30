<?php
include "koneksi.php";

$tahun	=	$_POST['tahun'];
$jual  	=	$_POST['jual'];

$query	=	mysqli_query($koneksi, "insert into penjualan (tahun, jual) values ('".$tahun."', '".$jual."')");

if ($query){
	echo "	<script>
            alert('Berhasil');
            window.location.href='input.php';
			</script>
		 ";
}else{
	echo "	<script>
			alert('Gagal');
			</script>
		 ";
}
?>