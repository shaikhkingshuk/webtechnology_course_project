<?php

session_start();
if(empty($_SESSION["semail"]))
{
	header("Location:http://localhost:8081/final/logout.php");
}



$conn = new mysqli('localhost', 'root', '', 'seller');
if(isset($_POST["submit"]))
{
		if(empty($_POST["iname"]))  
           {  
                echo "<script> alert('Enter product name'); </script>"; 
           }
           
      if(empty($_POST["iprice"]))  
      {  
           echo "<script> alert('Enter product price'); </script>"; 
      }
      if(empty($_POST["inumber"]))  
           {  
                echo "<script> alert('Enter contact number'); </script>"; 
           }
           
      if(empty($_POST["image"]))  
      {  
           echo "<script> alert('Enter product image'); </script>"; 
      }
      $iimail=$_SESSION["semail"];
	$iiname=$_POST['iname'];
	$iiprice=$_POST['iprice'];
	$iinumber=$_POST['inumber'];
	$imagename=$_FILES['image']['name'];
	$tmpname=$_FILES['image']['tmp_name'];
	$uploc='img/'.$imagename; 

	$sql="INSERT INTO allproducts(Email, Name, Price, Image, Number)
	VALUES('$iimail', '$iiname', '$iiprice', '$imagename','$iinumber')"; 
	if(mysqli_query($conn, $sql)==TRUE)
	{
		move_uploaded_file($tmpname, $uploc);
		header("Location:http://localhost:8081/final/myproducts.php");
	}
	else{
		echo "data not inserted";
	}
}


?>



 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
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
     </style> 
      </head>  
      <body> 
          <ul>
            <li><a href="http://localhost:8081/final/dashboard.php">Home</a></li>
            <li><a href="http://localhost:8081/final/llogin.php">Login</a></li>
            <li><a href="http://localhost:8081/final/registration.php">Registration</a></li>
            <li><a href="http://localhost:8081/final/logout.php">Logout</a></li>
          </ul>
 
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Add product</h3><br />

                <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
		
					<label for="name">Name : </label>
					<input type="text" name="iname" id="iname" required value="" class="form-control"><br>
					<label for="name">Price : </label>
					<input type="text" name="iprice" id="iprice" required value="" class="form-control"><br>
					<label for="name">Number : </label>
					<input type="text" name="inumber" id="inumber" required value="" class="form-control"><br>
					<label for="image">Image : </label>
					<input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="" class="form-control"><br><br>
					<button type="submit" name="submit" class="btn btn-info">Submit</button>
				</form>
           </div>  
           <br />  
           <footer>
               <h2>
                    <?php include 'finalfooter.php' ?>
               </h2>
           </footer>
      </body>  
 </html>