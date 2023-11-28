<?php
session_start();
if(empty($_SESSION["semail"]))
{
	header("Location:http://localhost:8081/final/logout.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<link rel="stylesheet" >
	<title></title> 
	<style>

		*{
			box-sizing:  border-box;
		}
		body {
			margin:  0px;
			padding:  0px;
			text-align: center;
		}
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
		header,footer{
			padding:  5px;
			background:  dodgerblue;
			color:  black;
			border-radius: 2px;
		}

		section{
			width:  34%;
			float: left;
			height: 560px;
			background: grey;
			margin-right: 0%;
		}
		.right{
			width: 66%;
			float: left;
			height:  560px;
			background: grey;
			border-left: 5px solid black;
			text-align: left;
			text-indent: 50px;
		}
		.main *{
			border-radius: 2px;
		}
		.main {
			margin: 1px 0px;
		}
		.main::after{
			content: "";
			clear:  both;
			display: table;
		}

	</style>
</head>
<body>
	    <ul>
		  <li><a href="http://localhost:8081/final/home.php">Home</a></li>
		  <li><a href="http://localhost:8081/final/llogin.php">Login</a></li>
		  <li><a href="http://localhost:8081/final/registration.php">Registration</a></li>
		  <li><a href="http://localhost:8081/final/logout.php">Logout</a></li>
		</ul>

	<div class="main">
		<section>
			<br><br><br><br>
			<h1>
				<a href="http://localhost:8081/final/dashboard.php">Dashboard</a><br><br>
				<a href="http://localhost:8081/final/profile.php">Profile</a><br><br>
				<a href="http://localhost:8081/final/editprofile.php">Edit Profile</a><br><br>
				<a href="http://localhost:8081/final/insertproduct.php">Add Product</a><br><br>
				<a href="http://localhost:8081/final/myproducts.php">View my product details</a><br><br>
				<a href="http://localhost:8081/final/displayproducts.php">Display all products</a><br><br>
			</h1>
		</section>
		<aside class="right">
			<br><br><br><h1>Name 		  : <?php echo $_SESSION["sname"] ?></h1><br>
			<h1>Email 		  : <?php echo $_SESSION["semail"] ?></h1><br>
			<h1>Gender		  : <?php echo $_SESSION["sgender"] ?></h1><br>
			<h1>Date fo birth : <?php echo $_SESSION["sdob"] ?></h1><br>
		</aside>
	</div>
	<footer>
		<h2>
			<?php include 'finalfooter.php' ?>
		</h2>
	</footer>
</body>
</html>