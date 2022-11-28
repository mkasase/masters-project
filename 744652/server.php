<?php
session_start();

// initializing variables
$fname = "";
$lname = "";
$email    = "";
$errors = array(); 
$title = "";
$desc = "";



// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'index');

// User registration 

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) { array_push($errors, "First name is required"); }
  if (empty($lname)) { array_push($errors, "Last name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same first name, last name and/or email
  $user_check_query = "SELECT * FROM users WHERE fname='$fname' AND lname='$lname' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['fname'] === $fname) {
      array_push($errors, "First name already exists");
    }
	
	if ($user['lname'] === $lname) {
      array_push($errors, "Last name already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (fname, lname, email, password)
    VALUES('$fname','$lname', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['fname'] = $fname;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: account.php');
  }
}

// User login
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['fname'] = $fname;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: account.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//Video Section 

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get video details
    $video = $_FILES['video']['name'];
    // Get title
    $title = mysqli_real_escape_string($db, $_POST['title']);
    // Get genre
    $genre = mysqli_real_escape_string($db, $_POST['genre']);
    // Get description
    $desc = mysqli_real_escape_string($db, $_POST['description']);
    //Insert into video directory
    $target = "videos/".basename($video);
    $sql = "INSERT INTO videos (video, title, genre, description) VALUES ('$video','$title', '$genre',$desc')";

    // execute query
    mysqli_query($db, $sql);
    if (move_uploaded_file($_FILES['video']['tmp_name'], $target)) {
      array_push($errors, $name." has been uploaded");
    }else{
      array_push($errors, $name." has failed to upload");
    }
  } $result = mysqli_query($db, "SELECT * FROM videos");
  





//Comment section 

function setComment ($db) {
	if (isset($_POST['submitpost'])) {
		$userid = $_POST['parent_id'];
		$date = $_POST['post_date'];
		$message = $_POST['message'];
		$sql = "INSERT into comment (parent_id, post_date, message) values ('$userid', '$date', '$message')";
		$result = mysqli_query($db, $sql);
	}
}
 
 function getComment ($db) {
	 $sql = "SELECT * FROM comment";
	 $result = mysqli_query($db, $sql);	
	 while($row = $result -> fetch_assoc()){
		echo "<div class = 'commentForm'><p>";
			echo $row['parent_id']."<br>";
			echo $row['post_date']."<br>";
			echo nl2br($row['message']);
		echo "</p> 
    <div>
      <form method='POST' action='".getComment($db)."'> 
          <input type = 'hidden' name='cid' id='commentId' value='".$row['cid']."'/>
          <input type = 'hidden' name='parent_id' id='commentId' value='".$row['parent_id']."' />
          <input type = 'hidden' name='post_date' id='commentId' value='".$row['post_date']."'/>
          <input type = 'hidden' name='message' id='commentId' value='".$row['message']."'/>
          <input type='submit' name='submitpost' id='submit' class='btn btn-primary'/
      </form>
    </div>";
	}
}
		
		
 function editComment ($db) {
	 if (isset($_POST['submitpost'])) {
		$cid = $_POST['cid'];
		$userid = $_POST['parent_id'];
		$date = $_POST['post_date'];
		$message = $_POST['message'];
		
		$sql = "UPDATE comment SET message = '$message' WHERE cid='$cid'";
		$result = mysqli_query($db, $sql);
		header("Location: watch.php");
	 }

 }
 


?>