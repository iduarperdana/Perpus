<!DOCTYPE html>
<html lang="en">

<?php
    include "koneksi.php";
    $hasil = $conn->query("SELECT * FROM upload");
?>
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

          <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-12 col-lg-16 tm-md-16 tm-sm-16 tm-col">
                    <div class="bg-white tm-block h-100">
                    <form action="update.php" method="get">
                        <div class="row">
                    
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Books</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="upload-file.php" class="btn btn-small btn-primary">Add New Books</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col" class="text-center">Kategori</th>
                                        <th scope="col" class="text-center">Deskripsi</th>
                                        <th scope="col">Tanggal </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php while ($baris = mysqli_fetch_array($hasil)){ ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td class="tm-product-name"><?php echo "$baris[nama_file]"; ?></td>
                                        <td class="text-center"><?php echo "$baris[kategori]"; ?></td>
                                        <td class="text-center"><?php echo "$baris[deskripsi]"; ?></td>
                                        <td class="text-center"><?php echo "$baris[tgl_upload]"; ?></td>
                                        <td>
                                        <?php
                                            echo "<a href= 'update.php?up=$baris[id_upload]'> Edit</a> |";
                                            echo "<a href= 'delete.php?delete=$baris[id_upload]'> Delete</a>";
                                         
                                        ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>

                     <!--    <div class="tm-table-mt tm-table-actions-row">
                            
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div> -->
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
    <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>
</body>

</html>
