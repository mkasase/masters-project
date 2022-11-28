<?php 
  session_start(); 

  if (!isset($_SESSION['fname'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['fname']);
  	header("location: index.php");
  }
  ?>

  
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="cssdoc.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<main>
		<nav class ="topnav" id="mytopnav">
			<a href="index.php">Home</a>
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
	   	<div class="contenta">
	   	<!-- notification message -->
	   	<?php if (isset($_SESSION['success'])) : ?>
	   		<div class="error success" >
	   			<h3>
	   				<?php 
	   				echo $_SESSION['success']; 
	   				unset($_SESSION['success']);
	   				?>
	   				</h3>
	   			</div>
	   		<?php endif ?>
	   		<!-- logged in user information -->
	   		<?php  if (isset($_SESSION['fname'])) : ?>
	   			<p>Welcome <strong><?php echo $_SESSION['fname']; ?></strong></p>
	   			<p> <a href="account.php?logout='1'" style="color: red;">logout</a> </p>
	   		<?php endif ?>
	   	</div>

	   	<section id="videopanel">
	   		<br>
	   		Content for New section Tag Goes Here
	   		<br>

		</section>

		<section id="comments">
			<br>
			Content for New section Tag Goes Here
			<br>

		</section>

		<footer />

	   </main>

</body>
</html>