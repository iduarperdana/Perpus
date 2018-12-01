<?php
		include "koneksi.php";
		if(isset($_POST['update'])){
		$idup = $_POST['id_f'];
		$judul = $_POST['judul'];
		$kategori = $_POST['kategori'];
		$deskripsi = $_POST['deskripsi'];
		
		
		$update = $conn->query("UPDATE upload SET nama_file = '$judul', kategori= '$kategori', deskripsi = '$deskripsi' WHERE id_upload ='$idup'	");
		if($update===true){
		header("location:dashboard.php");
	}
	echo "update succesfully";
}
?>