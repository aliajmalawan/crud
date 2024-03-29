<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "rifnozecl_std_dbms";
error_reporting();
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection

if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	if($_SERVER['REQUEST_METHOD']=="POST"){	

$UserName=$_POST['UserName'];
$FatherName=$_POST['FatherName'];
$Email=$_POST['Email'];
$PhoneCode=$_POST['PhoneCode'];
$Phone=$_POST['Phone'];
$Address=$_POST['Address'];
$Age=$_POST['Age'];
$Class=$_POST['Class'];
$Gender=$_POST['Gender'];

$sql = "INSERT INTO Register ( UserName, FatherName, Email,PhoneCode,Phone,Address,Age,Class,Gender)
VALUES ('$UserName', '$FatherName', '$Email','$PhoneCode','$Phone','$Address','$Age','$Class','$Gender')";

if ($conn->query($sql) === TRUE) {
  
  
  $_SESSION['UserName'] = $UserName;
  $_SESSION['FatherName'] = $FatherName;
  header("Location:show.php");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
} 

}else{
	echo"No direct access allowed!";
}

?>
