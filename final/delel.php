<?php
include 'myproducts.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seller";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "DELETE FROM allproducts WHERE Name='$pname'";

if (mysqli_query($conn, $sql)) {
  header("Location:http://localhost:8081/final/myproducts.php");
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);

?>