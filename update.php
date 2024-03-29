<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "std_dbms";
error_reporting();
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection

if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	if($_SERVER['REQUEST_METHOD']=="POST"){	
$UserID = $_POST['UserID'];
$UserName=$_POST['UserName'];
$FatherName=$_POST['FatherName'];
$Email=$_POST['Email'];
$PhoneCode=$_POST['PhoneCode'];
$Phone=$_POST['Phone'];
$Address=$_POST['Address'];
$Age=$_POST['Age'];
$Class=$_POST['Class'];
$Gender=$_POST['Gender'];
$return = $_POST['return'];
$sql = "UPDATE Register SET UserName='$UserName', FatherName='$FatherName', Email='$Email',PhoneCode='$PhoneCode',Phone='$Phone',Address='$Address',Age='$Age',Class='$Class',Gender='$Gender' WHERE UserID='$UserID'";

if ($conn->query($sql) === TRUE) {
  
    echo "<font color='green' style='background-color: white;'>Record updated successfully!</font><br/><br/>";
	echo "<a href='$return' style='background-color: Red; color:white;border:1px double red;border-radius:3px;'>Return back</a>";
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
} 

}else{
	echo"No direct access allowed!";
}

?>
