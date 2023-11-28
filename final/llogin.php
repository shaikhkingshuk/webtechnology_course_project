<?php
session_start();
?>
<?php
$aq=$sw=$de="";
$inputmismatch="";
$a=-1;
$message="";
$error="";
$oerror = "";
$nerror = "";
$cerror = "";
if(isset($_POST["submit"]))
{
if(empty($_POST["mail"]))
{
echo "<script> alert('Enter you mail address'); </script>";
}
if(empty($_POST["pass"]))
{
echo "<script> alert('Enter you passwor'); </script>";
}
if(!empty($_POST["mail"]) && !empty($_POST["pass"]))
{
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
    $sql= "SELECT Name,Email,Password,Gender,Date_of_birth FROM
    UserInfo";
    $sql_query=mysqli_query($conn,$sql);
    while($data=mysqli_fetch_array($sql_query))
    {
    $nameid=$data['Name'];
    $mailid=$data['Email'];
    $passid=$data['Password'];
    $genderid=$data['Gender'];
    $dobid=$data['Date_of_birth'];
    if($mailid==$_POST["mail"] && $passid==$_POST["pass"])
    {
    $_SESSION["sname"]=$nameid;
    $_SESSION["semail"]=$mailid;
    $_SESSION["sgender"]=$genderid;
    $_SESSION["sdob"]=$dobid;
    $_SESSION["spass"]=$passid;
    mysqli_close($conn);
    header("Location:http://localhost:8081/final/dashboard.php");
break;
}
else
{
echo "<script> alert('Data not matched'); </script>";
}
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
ul {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background-color: #333;
}
li {
float: left;
border-right:3px solid #bbb;
}
li:last-child {
border-right: none;
}
li a {
font-size: 20px;
display: block;
color: white;
text-align: center;
padding: 40px 40px;
text-decoration: none;
}

li a:hover:not(.active) {
background-color: #146C99 ;
}
.active {
background-color: #04AA6D;
}
footer{
padding: 5px;
background: dodgerblue;
color: black;
border-radius: 2px;
text-align: center;
}
</style>
</head>
<body>
<ul>
<li><a href="http://localhost:8081/final/home.php">Home</a></li>
<li><a href="http://localhost:8081/final/llogin.php">Login</a></li>
<li><a
href="http://localhost:8081/final/registration.php">Registration</a></li>
<li><a
href="http://localhost:8081/final/logout.php">Logout</a></li>
</ul>
<br><br><br><br>
<br>
<div class="container" style="width:500px;">
<h3 align="">Login</h3><br />
<form method="post">
<br />
<label>Email</label>
<input type="text" name="mail" class="form-control" /><br
/>
<label>Password</label>
<input type="password" name = "pass" class="form-control"
/><br />
<input type="submit" name="submit" value="submit"
class="btn btn-info" /><br />
</form>
</div>
<br><br><br><br><br><br><br>
<br><br>
<footer>
<h2>
<?php include 'finalfooter.php' ?>
</h2>
</footer>
</body>
</html>
