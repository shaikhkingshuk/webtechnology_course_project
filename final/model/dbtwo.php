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

// sql to create table
$sql = "CREATE TABLE UserInfo (
Name VARCHAR(30) NOT NULL,
Email VARCHAR(30) NOT NULL PRIMARY KEY,
Password VARCHAR(30) NOT NULL,
Gender VARCHAR(30) NOT NULL,
Date_of_birth VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table UserInfo created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>