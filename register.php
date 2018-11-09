
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title> Register </title>
  
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
             REGISTER
            </div>

            <div class="card card-primary">
              <div class="card-body">
                    <form class="form-horizontal" method="POST" action="test-register.php">
                        <div class="form-group">
                            <label for="name" class="d-block" >Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email" class="d-block">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="" required>     
                        </div>
                      <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                               
                        </div>

                        <div class="form-group col-6">
                            <label for="confirm_pass" class="d-block">Confirm Password</label>
                                <input id="confirm_pass" type="password" class="form-control" name="confirm_pass" required>
                        </div>
                      </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Paperpush
            </div>
        </div>
    </div>
</div>
</section>
</div>

  <script src="dist/modules/jquery.min.js"></script>
  <script src="dist/modules/popper.js"></script>
  <script src="dist/modules/tooltip.js"></script>
  <script src="dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="dist/modules/moment.min.js"></script>
 
</body>
</html>
