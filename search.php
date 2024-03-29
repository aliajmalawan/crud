<?php
session_start();
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

	if($_SERVER['REQUEST_METHOD']=="GET"){	

$UserName=$_GET['UserName'];
$FatherName=$_GET['FatherName'];
$Email=$_GET['Email'];

$sql = "SELECT *  FROM Register WHERE UserName LIKE '%$UserName%' AND FatherName LIKE '%$FatherName%' AND Email LIKE '%$Email%'";

?>

<table width="100%" border="1" style=" border-collapse: collapse; background-color:white " >
 
	<tr>
	
		<th> UserID </th>
		<th> UserName </th>
		<th> FatherName</th>
		<th> Email </th>
		<th> PhoneCode </th>
		<th> Phone </th>
		<th> Address </th>
		<th> Age </th>
		<th> Class </th>
		<th> Gender </th>
		<th> Operation </th>
	
	</tr>


 <?php 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 
 ?>
 
	<tr>
		<td> <?php echo $row['UserID']; ?> </td>
		<td> <?php echo $row['UserName']; ?> </td>
		<td> <?php echo $row['FatherName']; ?> </td>
		<td> <?php echo $row['Email']; ?> </td>
		<td> <?php echo $row['PhoneCode']; ?> </td>
		<td> <?php echo $row['Phone']; ?> </td>
		<td> <?php echo $row['Address']; ?> </td>
		<td> <?php echo $row['Age']; ?> </td>
		<td> <?php echo $row['Class']; ?> </td>
		<td> <?php echo $row['Gender']; ?> </td>
		<td> <a href="delete.php?run=<?php echo $row['UserID']; ?>&return=search.php?<?php echo urlencode($_SERVER['QUERY_STRING']); ?>"><span id="del">Delete</span> </a> | <a href="editForm.php?id=<?php echo $row['UserID']; ?>&return=search.php?<?php echo urlencode($_SERVER['QUERY_STRING']); ?>"><span id="edit">Edit</span></a> </td>
		
	</tr>
 
  <?php 
  
  } 

}
else{
	echo'<tr>
		<td colspan="10">No search result(s) found!</td>
	</tr>';
}


}
  ?>
 
 </table>

 <style type="text/css">
 	#del {
		color: white;
		background-color:red;
		border: 1px solid green;
		border-radius: 4px;
		font-size: 18px;
	}
	#edit {
		color: white;
		background-color:green;
		border: 1px solid red;
		border-radius: 4px;
		font-size: 18px;
	}
	#del:hover {
		color:black;
	}
	#edit:hover {
		color:black;
	}
	a,ul,li {
		box-shadow: 2px 3px 3px yellow;
	}
 </style>