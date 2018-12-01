
<?php
	include ('text-processing/stemming.php');
	include ('koneksi.php');
	$text = new Stemming();

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
<!------ Include the above in your HEAD tag ---------->

<body class="bg01">
	<div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="index.html">
                            <i class="fa fa-book fa-2x"></i>
                            <h1 class="tm-site-title mb-0">Paperpush</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                
                              
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="login.php">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    
                </div>

            </div>
	
	  <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-12 col-lg-16 tm-md-16 tm-sm-16 tm-col">
                	<div class="navbar-form">
				<div class="col-lg-4 col-sm-6">
					<div class="dropdown" style="margin-top: 20px;">
							<div class="input-group">
								<input id="search" class="form-control" type="text" name="search" value="<?php if(isset($_POST['search'])){ echo $_POST['search']; }else{ echo '';}?>"  required/>
							
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">
											<i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
										</button>
									</span>
									 
							</div>
      			       		
					</div>
				</div>
			</div>
                    <div class="bg-white tm-block h-100">

                    <form action="update.php" method="get">
                        <div class="row">
                    
                           
                            
                        </div>
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col" class="text-center">Kategori</th>
                                        <th scope="col" class="text-center">Deskripsi</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>1</td>
                                        <td ></td>
                                        <td ></td>
                                       
                                        
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </form>

                     
                    </div>
                </div>

				<?php
					if(isset($_POST['search']))
					{
						$input = $_POST['search'];
						$stemming = $text->stem($input);
							
							foreach ($stemming as $term => $count) 
							{
								if($term != "")
								{
								?>
										<!-- Pencocokan kata -->
									<?php 
									$text = new Stemming();
									$query=mysqli_query($conn,"SELECT deskripsi FROM upload WHERE id_upload "); 
									if($rows=mysqli_num_rows($query)>0)
									{ 


									?>

										<?php

										while($input = mysqli_fetch_array($query,MYSQLI_ASSOC))
										{
											
											$plain_text=implode($input);
											$plain_text=explode(PHP_EOL, $plain_text);
											foreach ($plain_text as $key ) 
											{
												# code...
											}
											// $termfreq = array();
											// unset($termfreq);
												$jumlah_dokumen =count($input);
												$stemming = $text->stem($key);
												foreach ($stemming as $kata => $jumlah) 
												{
													if($kata != "")
													{
													 		?>
													
														  <?php
														  if($result=preg_match("/$term/i", $kata)) 
														  {
														  	// echo ('</br>');
														  	// echo $key,(" -> ");
														  	echo $key;
														  	echo "<br />";
														  	echo ("kata :"),$kata;
														  	echo "<br />";
														  	echo (" | frekuensi = "),$jumlah;
														  	echo "<br />";
														  	// $termfreq[] = $jumlah;
														  } else {
														  	unset($kata);
														  }  
														?>
														<?php
												 	} 

														// echo json_encode($termfreq);
												}
										}
									}
							

										  ?>


										<!-- End Pencocokan -->
										<?php  
								}
							}
					}
					
				?>





</body>
