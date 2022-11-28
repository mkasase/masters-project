<?php
session_start();

// initializing variables
$fname = "";
$lname = "";
$email    = "";
$errors = array();
$title = "";
$desc = "";
$msg = "";


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'index');

// REGISTER USER
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

// LOGIN USER
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





 //upload video
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

    $sql = "INSERT INTO video (video, title, description) VALUES ('$video','$title','$desc')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['video']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
  header('location: category.php');

?>
