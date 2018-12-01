
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
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>
     <?php
            include ("koneksi.php");
            $idup = $_GET['up'];
            $hasil = $conn->query("SELECT * FROM upload WHERE id_upload='$idup'");
            $baris = mysqli_fetch_array($hasil);

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
                                
                                <li class="nav-item ">
                                    <a class="nav-link" href="upload-file.php">Books</a>
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

    <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Update Books</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-10 col-lg-10 col-md-12">
                            <form class="tm-edit-product-form" method="POST" action="edit-data.php">
                           
                                <input type="hidden" name="id_f" value="<?php echo "$idup"; ?>">
                                <div class="input-group mb-3">
                                    <label for="judul" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Book Title
                                    </label>
                                    <input id="judul" name="judul" type="text" class="form-control validate col-xl-10 col-lg-10 col-md-10 col-sm-8" value="<?php echo "$baris[nama_file]"; ?>">
                                </div>
                              
                                <div class="input-group mb-3">
                                    <label for="category" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Category</label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="kategori" name="kategori">
                                                            
                                      <option value="0">--Select Kategori--</option>
                                      <option value="Horor">Horor</option>
                                      <option value="Drama">Drama</option>
                                      <option value="Fiksi">Fiksi</option>
                                      <option value="Fabel">Fabel</option>
                                      <option value="Sejarah">Sejarah</option>
                                      <option value="Scifi">Scifi</option>
                                
                                    </select>
                                </div>
                                  <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                    <textarea name="deskripsi" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" rows="3" required><?php echo "$baris[deskripsi]"; ?></textarea>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button type="submit" name="update" class="btn btn-primary">Update
                                        </button>
                                    </div>
                                </div>
                            </form>
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