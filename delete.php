<?php 
	include "koneksi.php";
	$a = $_GET["delete"];
	$hasil = $conn->query("DELETE FROM upload WHERE id_upload='$a'");
	if ($hasil) {
		header("location:dashboard.php");
		
	}
 ?>