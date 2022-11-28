<?php include('server.php');
date_default_timezone_set('Europe/London');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="cssfolder/cssdoc.css">
	<link rel="stylesheet" href="cssfolder/theme.css">
	<meta name="viewport" content="width=device-width, 
	initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<main>
	<nav class ="topnav" id="mytopnav">
		<a href="index.php" class="active">Home</a>
	    <a href="category.php">Category</a>
	    <a href="upload.php">Upload</a>
	    <div class="search-container">
	      <form action="/action_page.php">
	        <input type="text" placeholder="Search.." name="search">
	        <button type="submit"><i class="fa fa-search"></i></button>
	      </form>
	    </div>
	    <div class="loginbtn">
	      <button type="submit" onclick="window.location.href ='login.php';">login</button>
	    </div>
	    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
	      <i class="fa fa-bars"></i>
	    </a>
	   </nav>
	   <script>
	   	function myFunction() {
	   		var x = document.getElementById("mytopnav");
	   		if (x.className === "topnav") {
	   			x.className += " responsive";
	   		} else {
	   			x.className = "topnav";
	   		}
	   	}
	   </script>
	   
	   <header>UP744652 Website</header>

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
			echo "<div id='img_div'>";
			echo "<p>".$title."</p>";
			echo "<iframe src ='videos/ ".$video."width='640' height='320'' ></iframe";
			echo "<br>";
		    echo "<p>".$desc."</p>";
		    echo "</div>";
		  	
		} else {
			array_push($errors, "No video is shown");
		} ?>
			
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
<footer />
</main>
</body>
</html>