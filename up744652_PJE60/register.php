<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registration system </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
	<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Short video feedback</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="category.php">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="upload.php">Upload</a>
          </li>
        </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a class="nav-link"  href="register.php"> Sign Up</a></li>
              <li><a class="nav-link" href="login.php"> Login</a></li>
          </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
      </div>
    </div>
  </div>
  
      <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div class="card" style="max-width: 40rem;" >
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="register.php"  method="post">
                          <?php include('errors.php'); ?>
                            <h3 class="text-center text-info">Registration</h3>
                            <div class="form-group">
                                <label for="fname" class="text-info">First Name:</label><br>
                                <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>">
                            </div>
							<div class="form-group">
                                <label for="lname" class="text-info">Last name:</label><br>
                                <input type="text" name="lname"class="form-control" value="<?php echo $lname; ?>">
                            </div>
							<div class="form-group">
                                <label for="lname" class="text-info">Email Address:</label><br>
                                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password_1" class="form-control" value="">
                            </div>
							<div class="form-group">
                                <label for="password" class="text-info">Confirm Password:</label><br>
                                <input type="password" name="password_2" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-info btn-md" name="reg_user">Register</button>
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="login.php" class="text-info">Login here</a>
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="index.php" class="text-info">Return to homepage</a>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
