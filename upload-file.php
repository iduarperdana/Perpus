
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
             FORM UPLOAD
            </div>
                 <div class="card card-primary">
              		<div class="card-body">
	                    <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="hasil-upload.php">
	                        <div class="form-group">
	                            <label for="file" class="d-block" >File yang di upload</label>
	                                <input id="fupload" type="file" class="form-control" name="fupload" >
	                        </div>
	                        <div class="form-group">
	                            <label for="deskripsi" class="d-block">Deskripsi File</label>
	                                <textarea name="deskripsi" rows="8" cols="110"></textarea>   
	                        </div>
	                   		 <input type=submit value=Upload>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>