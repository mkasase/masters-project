<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "CommentTut";

//Connection to database, we use OOP method of connection
$db = new mysqli("localhost", "root", "", "CommentTut");

//Returns true if there is NO connection
if(!$db){
	//Error Message
	die("Connection error: " . mysqli_connect_error());
}