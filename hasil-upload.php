
  <?php
include("koneksi.php");
include ('text-processing/stemming.php');
include ('IDNstemmer.php');
$text = new Stemming();



 $judul = $_POST['judul'];
 $kategori = $_POST['kategori'];
 $string = $_POST['deskripsi'];
 $word = str_word_count(strtolower($string ),1);
 $jumlah = count($word);

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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title> Form Upload </title>
  
 <link rel="stylesheet" href="dist/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="dist/css/demo.css">
  <link rel="stylesheet" href="dist/css/style.css">
</head>
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
             FORM HASIL
            </div>
                <div class="card card-primary">
                  <div class="card-body">
                   
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
                                  <textarea name="deskripsi" rows="8" cols="110"><?php echo $_POST['deskripsi'] ?></textarea>   
                          </div>
                           
                          <div class="table-responsive">
                            <table class="table">
                              <tr>
                                <th><h5>Token</h5></th>
                              </tr>
                              <tr>
                                <?php foreach ($word as $key=>$val) { echo "<tr><td>$val</td></tr>";    }?>
                                <td><?php {echo "<b>Jumlah Kata : " .$jumlah. "</b><br>"; }?></td>
                              </tr> 
                            </table>
                           </div>
                          <div class="table-responsive">
                            <table class="table table-striped">
                              <tr>
                                <th><h5>Hasil Stemming</h5></th>
                              </tr>
                              
                    <?php 
                          

                            while ($baris = mysqli_fetch_array($hasil))
                            {
                                echo '<tr>
                                  <td>'. $baris['token'].'</td>
                                  
                                 </tr>';
                                     
                            } ?> 

                           
                             
                            
                            </table>
                           
                          </div>
                       </form>
                 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

