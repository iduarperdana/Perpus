
<?php
	include ('text-processing/stemming.php');
	$text = new Stemming();

?>

	<!DOCTYPE html>
	<html>
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	</head>
	<body>


		<!-- Navbar goes here -->
		<nav>
			<div class="nav-wrapper">
				<a href="http://localhost/perpus/index.php" class="brand-logo center"><img src="img/logo.png" style="width:45px;height:45px; margin-top: 10px;"> Paperpush</a>
			</div>
		</nav>


		<nav>
			<div class="nav-wrapper  pink darken-1">
				<form action="index.php" method="POST">
					<div class="input-field">
						<input id="search" type="search" name="search" value="<?php if(isset($_POST['search'])){ echo $_POST['search']; }else{ echo '';}?>" >
						<label class="label-icon" for="search"><i class="material-icons">search</i></label>
						<i class="material-icons">close</i>
					</div>
				</form>
			</div>
		</nav>

		<table style="margin-bottom: 100px;">
			<thead>
				<tr>
					<th>NO</th>
					<th>Nama Buku</th>
					<th>Genre</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(isset($_POST['search'])){
						$input = $_POST['search'];

						$stemming = $text->stem($input);
						echo "kata : ".json_encode($stemming).'<br/>';}
					?>

					</tbody>
		</table>


	</body>

	<footer class="page-footer" style="position: fixed;left: 0;bottom: 0;width: 100%;">
		<div class="footer-copyright">
			<div class="container">
				© 2018 Copyright Paperpush
				<a class="grey-text text-lighten-4 right" href="#!">Paperpush.com</a>
			</div>
		</div>
	</footer>
	</html>