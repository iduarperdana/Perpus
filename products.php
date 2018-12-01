<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page - Dashboard Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>


 <?php
include("koneksi.php");
include ('text-processing/stemming.php');

$text = new Stemming();


 $judul = $_POST['judul'];
 $kategori = $_POST['kategori'];
 $string = $_POST['deskripsi'];
 $tgl_upload = date("Ymd");
 $word = str_word_count(strtolower($string ),1);
 $jumlah = count($word);

 $query = "INSERT INTO upload (nama_file,kategori, deskripsi, tgl_upload)
            VALUES('$judul', '$kategori','$_POST[deskripsi]', '$tgl_upload')";
 $save = $conn->query($query); 

if(isset($_POST['deskripsi']))
{
    $input= $_POST['deskripsi'];
   
    $stemming = $text->stem($input);
   
    foreach($stemming as $stem =>$value)
    {
        
        if($stem != "")
          {
                

              $data = "INSERT INTO dokumen(judul, kategori, token) VALUES('$judul','$kategori','$stem')";
              $simpan = $conn->query($data);  
         
         }
    
    }
$hasil = $conn->query("SELECT token FROM dokumen WHERE judul ='$judul'");
} 


            

?> 

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="index.html">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">Dashboard</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard.php">Dashboard
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="upload-file.php">File</a>
                                </li>

                              
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
            <br>

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white tm-block h-100">
                    	 <form class="form-horizontal" method="POST" action="hasil-upload.php">
                          <div class="form-group">
                              <label for="title" class="d-block" >Judul</label>
                                  <input id="judul" class="form-control" name="judul" value="<?=isset($_POST['judul']) ? $_POST['judul'] : ''?> ">
                          </div> 
                          <div class="form-group">
                              <label for="title" class="d-block" >Kategori</label>
                                  <input id="kategori" class="form-control" name="kategori"value="<?=isset($_POST['kategori']) ? $_POST['kategori'] : ''?> ">
                          </div>
                          <div class="form-group">
                              <label for="deskripsi" class="d-block">Deskripsi File</label>
                                  <textarea name="deskripsi" rows="8" cols="120"><?php echo $_POST['deskripsi'] ?></textarea>   
                          </div>
                      </form>
                    	</div>
                </div>
            </div>
        </div>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
            	 <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title d-inline-block">Tokenisasi</h2>
                        <table class="table table-hover table-striped mt-3">
                            <tbody>
                              
                                   <?php foreach ($word as $key=>$val) { echo "<tr><td>$val</td></tr>";    }?>
                                <td><?php {echo "<b>Jumlah Kata : " .$jumlah. "</b><br>"; }?></td>
                              
                            </tbody>
                        </table>

                        
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Hasil Stemming</h2>
                            </div> 
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <?php $i=1; ?>
                                    <?php while ($baris = mysqli_fetch_array($hasil)){ ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo "$baris[token]"; ?></td>
                                    </tr>
                                     <?php } ?>
                    		
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

                
            
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2018. Created by
                        <a href="http://www.tooplate.com" class="text-white tm-footer-link"></a> |  TI UDAYANA 2018 <a href="#" class="text-white tm-footer-link">Paperpush</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('.tm-product-name').on('click', function () {
                window.location.href = "edit-product.html";
            });
        })
    </script>
</body>

</html>