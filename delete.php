<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "std_dbms";
error_reporting(0);
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection

if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$UserID=$_GET['run'];
$return = $_GET['return'];
$query="DELETE FROM Register WHERE UserID = '$UserID'";

$data=$conn->query($query);

if($data) {
	echo "<font color='green' style='background-color: white;'>Record Deleted from Database</font><br/><br/>";
	echo "<a href='$return' style='background-color: red; color:white;border:1px double red;border-radius:3px;'>Return back</a>";
}
else {
	echo "<font color='red' style='background-color:red;'>Failed to delete Record Deleted from database</font>";
	
}
?>


