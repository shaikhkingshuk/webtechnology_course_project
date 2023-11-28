<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seller";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql= "SELECT Name, Email, Gender FROM UserInfo";
$sql_query=mysqli_query($conn,$sql);
while($data=mysqli_fetch_array($sql_query))
{
	$id=$data['Name'];
	$idd=$data['Email'];

	echo $id.'  '.$idd;
}

?>