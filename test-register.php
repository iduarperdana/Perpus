<?php
	include("koneksi.php");
	$nama_user = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_pass = $_POST['confirm_pass'];
	
	$sql = "SELECT * FROM user WHERE email = '$email'";
	$query = $conn->query($sql);
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
	if ($query->num_rows != 0) {
		echo "<div align='center'>Username Sudah Terdaftar ! <a href='register.php' style='text-decoration: none;'><b>Back</b></a></div>";
	} else {
		if (!$email || !$password) {
			echo "<div align='center'>Masih ada data yang kosong !<a href='register.php' style='text-decoration: none;'><b>Back</b></a></div>";
		} else {
			$data = "INSERT INTO user (nama_user, email, password, confirm_pass) VALUES('$nama_user','$email','$password','$confirm_pass')";
			$simpan = $conn->query($data);
			if ($simpan) {
				echo "<div align='center'>Pendaftaran Sukses, Silahkan <a href='login.php' style='text-decoration: none;'><b>Login</b></a></div>";
			} else {
				echo "<div align='center'><b>Proses Gagal !</b></div>";
			}
		}
	}
?>