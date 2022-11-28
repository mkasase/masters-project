<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Upload system</title>

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
  
<div class="container" style="margin-top:60px">
  <h3>Collapsible Navbar</h3>
  <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
  <p>Only when the button is clicked, the navigation bar will be displayed.</p>
</div>
  <!-- Page Content -->
    
  
    
    <div class="container" style="margin-top:15px" >
        <div class="card" style="max-width: 60rem;" >
            <form id="login-form" class="form" action="login.php" method="post"> 
                <div class="card-header"> Upload panel </div>
                <div class="card-body">
                    <div class="file-upload-wrapper">
                        <input type="file" id="input-file-now" class="file-upload" />
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email" class="text-info">Title:</label><br>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-info">genre:</label><br>
                        <select name="cars" class="custom-select mb-3">
                            <option selected>Custom Select Menu</option>
                            <option value="nature">nature</option>
                            <option value="education">educational</option>
                            <option value="orginal">Original</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Description:</label>
                        <textarea class="form-control" rows="3" id="comment"></textarea>
                    </div> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-sm" name="submit">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
   

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
