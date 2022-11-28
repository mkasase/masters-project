<!DOCTYPE html>
<html lang="en">

<head>
<?php include('server.php');
date_default_timezone_set('Europe/London');
 ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Video</title>

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
  
<div class="container" style="margin-top:50px">
  <h3>Collapsible Navbar</h3>
  <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
  <p>Only when the button is clicked, the navigation bar will be displayed.</p>
</div>

  <!-- Page Content -->
<div class="container">
<h3> class="text-center text-white pt-5">Login form</h3

  <!-- Portfolio Item Heading -->
  <h1 class="my-4">Video heading
    <small>Secondary Text</small>
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">
  
  
  <?php
		if (isset($_GET['idvideo']))
		{
			$id = $_GET['idvideo'];
			
			$query = mysqli_query($db,"SELECT * FROM 'videos' WHERE idvideo='$id'");

			while ($row = mysqli_fetch_array($result)) 
			{
		      	$title = $row['title'];
		      	$video = $row['video'];
		      	$desc = $row['description'];
		      	$genre = $row['genre'];
		     } 
			echo "<div class='embed-responsive embed-responsive-1by1'>";
			echo "<p>".$title."</p>";
			echo "<iframe class='embed-responsive-item' src ='videos/ ".$video."></iframe'";
			echo "<br>";
		    echo "<p>".$desc."</p>";
		    echo "</div>";
		  	
		} else {
			array_push($errors, "No video is shown");
		} ?>

    <div class="col-md-4">
      <h3 class="my-1">Project Description</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	  Nam viverra euismod odio, gravida pellentesque urna varius vitae. 
	  Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, 
	  justo eu convallis placerat, felis enim.</p>
    </div>

  </div>
  
  <!-- /.row -->
  
  <!---Comments---->
		<div class="container">
		<?php
		echo "<form method='POST' action='".setComment($db)."'> 
		
			<div class='form-group'>
				<div class='form-group'>
						<textarea name='comment' id='comment' class='form-control' 
						placeholder='Enter Comment' rows='5' required></textarea>
					</div>
				</div>
				<span id='message'></span>
					<div class='form-group'>
						<input type='hidden' name='parent_id' id='commentId' value='0' />
						<input type='hidden' name='post_date' id='commentId' value='".date('Y-m-d H:i:s')."' />
						<input type='submit' name='submitpost' id='submit' class='btn btn-primary' />
					</div>
			</form>"

		?>

		<?php
		echo "<form method='POST' action='".getComment($db)."'> 
			    <input type = 'hidden' name='cid' id='commentId' value='".$row['cid']."'/>
			    <input type = 'hidden' name='parent_id' id='commentId' value='".$row['parent_id']."' />
			    <input type = 'hidden' name='post_date' id='commentId' value='".$row['post_date']."'/>
			    <input type = 'hidden' name='message' id='commentId' value='".$row['message']."'/>
			    <input type='submit' name='submitpost' id='submit' class='btn btn-primary'/
			</form>"?>
					
	</div>
  <!-- Related Projects Row -->
  <h3 class="my-4">Related Videos</h3>

  <div class="row">

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
