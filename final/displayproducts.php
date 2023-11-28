<?php

session_start();
if(empty($_SESSION["semail"]))
{
	header("Location:http://localhost:8081/final/logout.php");
}

$conn = new mysqli('localhost', 'root', '', 'seller');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
               padding:  5px;
               background:  dodgerblue;
               color:  black;
               border-radius: 2px;
               text-align: center;
               position: fixed;
			   bottom: 0;
			   width: 100%;
          }
          table, th, td {
						  border: 4px solid black;
						  border-radius: 10px;
						  text-align: center;
						  font-weight: bold;
						}
     </style>
</head>
<body>

	<ul>
            <li><a href="http://localhost:8081/final/dashboard.php">Home</a></li>
            <li><a href="http://localhost:8081/final/llogin.php">Login</a></li>
            <li><a href="http://localhost:8081/final/registration.php">Registration</a></li>
            <li><a href="http://localhost:8081/final/logout.php">Logout</a></li>
          </ul>
	<table style="width:100%" border = 5 cellspacing = 5 cellpadding = 20>
		<tr>
			<td>#</td>
			<td>Product Name</td>
			<td>Price</td>
			<td>Image</td>
			<td>Number</td>
		</tr>
		<?php 
		$i=1;
		$rows=mysqli_query($conn,"SELECT * FROM allproducts");
		?>
		<?php 
		foreach($rows as $row) : ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $row["Name"]; $pname=$row["Name"]; ?></td>
			<td><?php echo $row["Price"].' tk'; ?></td>
			<td><img src="img/<?php echo $row['Image']; ?>" height=150 title=""></td>
			<td>Contact number:<br>+0 <?php echo $row["Number"]; ?></td>
		</tr>
	<?php endforeach; ?>
</table>
<br><br><br><br>
<footer>
               <h2>
                    <?php include 'finalfooter.php' ?>
               </h2>
           </footer>
</body>

</body>
</html>