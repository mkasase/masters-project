<?php
include ('server.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="cssdoc.css">
	<link href="theme.css" rel="stylesheet" type="text/css">
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
		<section id="searchlist">
			<br>
			Content for  class "searchlist" Goes Here
			<br>

		</section>

		<section id="vidlist">
			<br>
			Content for  class "vidlist" Goes Here
			<br>
		</section>
		<footer />
	</main>

</body>
</html>
