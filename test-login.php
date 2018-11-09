

<?php
include ('koneksi.php');
	// INI ISI LANDING PAGE

	if(isset($_POST['email'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$login_user = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'");
		$numrow_user = mysqli_num_rows($login_user);

		$login_admin = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");
		$numrow_admin = mysqli_num_rows($login_admin);

		echo $numrow_admin;

		if($numrow_user == 1 || $numrow_admin== 1){
			if($numrow_user == 1){
				foreach ($login_user as $user_user) {
					$_SESSION['nama_user'] = $user_user['nama_user'];
					$_SESSION['id_user'] = $user_user['id_user'];
				}
				header("Location: index.php");
				exit();
			} else {
				echo "string";
				foreach ($login_admin as $user_admin) {
					$_SESSION['nama_admin'] = $user_admin['nama_admin'];
					$_SESSION['id_admin'] = $user_admin['id_admin'];
				}
				header("Location: upload-file.php");
				exit();
			}
		} else {
			echo "salah";
		}
	} else {
		if(isset($_SESSION['nama_user'])||isset($_SESSION['nama_admin'])){
			if(isset($_SESSION['nama_user'])){
				echo $_SESSION['nama_user'];
				echo "<a href=\"index.php\">test</a>";
			} else {
				echo $_SESSION['nama_admin'];
				echo "<a href=\"upload-file.php\">tost</a>";
			}
		} else {
		}
	}
?>