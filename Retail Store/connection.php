<?php
error_reporting(0);
$server_name = "localhost";
$username = "anagf20";
$password = "nag221198";
$database_name = "C354_anagf20";

// Create connection
$conn= mysqli_connect($server_name,$username,$password,$database_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
