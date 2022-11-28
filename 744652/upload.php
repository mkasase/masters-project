<?php include('video.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		        <button type="submit"><em class="fa fa-search"></em></button>
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
	   
	   <header> Up744652 website</header>
	   <div id="main-body">
	   		<div id="uploadbody">
		   		<div class="uploadpage">
		   			<form method="POST" action="upload.php" enctype="multipart/form-data">
		   			<input type="file" name="video" value="1000000">
		   			<br>
					</form>

					<br>
					<form action="upload.php">
						<fieldset>
							<legend>Insert video details</legend>
							<label>Enter title</label>
							<input type="text" name="title" />
							<br>
							<label>Select Genre</label> <select name ="genre" value>
								<option value="nature">nature</option>
								<option value="education">educational</option>
								<option value="orginal">Original</option>
								<option value="other">Other</option>
							</select> 
							<br>
  
							<label>Description</label>
							<br>
							<textarea name="desc" rows="3" cols="30" type="text"
							placeholder="Description of the video"></textarea>
							<br>
						</fieldset>
						<br>
					<button type="submit" name="upload">POST</button>
				</form>
			</div>
		</div>
	</div>
	<footer/>
	</main>
</body>
</html>