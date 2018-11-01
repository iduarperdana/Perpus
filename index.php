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
      <a href="#" class="brand-logo center"><img src="img/logo.png" style="width:45px;height:45px; margin-top: 10px;"> Paperpush</a>
    </div>
  </nav>
        
  
  <nav>
    <div class="nav-wrapper  pink darken-1">
      <form action="index.php" method="GET">
        <div class="input-field">
          <input id="search" type="search" name="search" required>
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
          <tr>
            <?php
							// Dipanggil fungsi tokenisasi
							// $stats = tokenisasi($content);
            $i=1;
            $kalimat = isset($_GET['search']) ? $_GET['search']: '';
            $kalimat_array = explode(" ",$kalimat);
				foreach($kalimat_array as $value){
    				if(isset($str_count[$value]))
    					$str_count[$value]++;
    				else
    					$str_count[$value]=1;
}
							foreach($str_count as $key => $value) {

								// if term != "", supaya gak diindex term yg kosong
								if($key != ""){
						?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $key ?></td>
							<td><?php echo $value ?></td>
							
						</tr>
						<?php
									$i++;
								}
							}
						?>
          </tr>
        
        </tbody>
      </table>


</body>

 <footer class="page-footer" style="position: fixed;left: 0;bottom: 0;width: 100%;">
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Paperpush
            <a class="grey-text text-lighten-4 right" href="#!">Paperpush.com</a>
            </div>
          </div>
        </footer>
</html>

<?php



   


//echo "My first PHP script!";
?>