<?php
//session start
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "rifnozecl_std_dbms";
error_reporting(0);
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection

if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<!--HTML Tag Open-->
<html>
<head>
<!--style sheet-->
<style>
	#del {
		color: white;
		background-color:red;
		border: 1px solid green;
		border-radius: 4px;
		padding:2px;
		font-size: 18px;
	}
	#edit {
		color: white;
		background-color:green;
		border: 1px solid red;
		border-radius: 4px;
		padding:2px;
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
</head>
<!--Body Tag Open-->
<body style="background-color: white;">
<!--PHP Tag-->
<?php 
	
echo "Welcome  ".$_SESSION['UserName']." (" . $_SESSION['FatherName'] . ")!";

?>
<br> <br>
<!--
<a href="./" > Home</a> <br><br>
-->
<!--Table Tag Open-->
 <table width="100%" border="1" style=" border-collapse: collapse;">
 
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
 
 $sql = "SELECT * FROM Register order by UserID desc";
 
$result = $conn->query($sql);

if ($result->num_rows > 0) 
	//start loop
	{ 
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
		<td> <a href="editForm.php?id=<?php echo $row['UserID']; ?>&return=show.php"id="edit" > Edit </a> | <a href="delete.php?run=<?php echo $row['UserID']; ?>&return=show.php" id="del"> Delete</a> </td>
		
	</tr>
 
  <?php 
  
  } // closing if 

}// closing loop
  ?>
 
 <!--Table Tag Close-->
 </table>

<!--Body Tag Close-->
</body>
<!--HTML Tag Close-->
</html>
