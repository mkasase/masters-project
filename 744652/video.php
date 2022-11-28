<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "index");

  $title = "";
  $desc = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$video = $_FILES['video']['name'];
    // Get text
    $title = mysqli_real_escape_string($db, $_POST['title']);
  	// Get text
  	$desc = mysqli_real_escape_string($db, $_POST['description']);

  	// image file directory
  	$target = "videos/".basename($video);

  	$sql = "INSERT INTO videos (video, title, description) VALUES ('$video','$title','$desc')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['video']['tmp_name'], $target)) {
  		echo "<br />".$name." has been uploaded";
  	}else{
  		echo "<br />".$name." has failed to upload";
  	}
  }
  
  $result = mysqli_query($db, "SELECT * FROM videos");
?>


