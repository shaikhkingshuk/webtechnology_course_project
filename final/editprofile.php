<?php  

session_start();

$a=-1;
$errorone="";
$errortwo="";
$errorthree="";
$errorfour="";
$errorfive="";
$errorsix="";
$errorseven="";
 $message = '';  
 $error = '';  
 $name1='';
 $email1='';
 $pass1='';
 $gender1='';
 $dob1='';
 if(isset($_POST["submit"]))  
 {  
          if(empty($_POST["name"]))  
           {  
                $name1=$_SESSION["sname"];
           }
           else
           {
               if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])) 
               {
                    echo "<script> alert('Enter the name correctly'); return false; </script>";
               }
               else
               {
               	$name1=$_POST["name"];

               }
           }  

      if(empty($_POST["pass"]))  
      {  
          $pass1=$_SESSION["spass"];
      }
      else
      {
          $a=preg_match("/[@#$%]/i",$_POST["pass"]);

               if($a==1)
                {
                    if(strlen($_POST["pass"])<8)
                    {
                         echo "<script> alert('New password length must be greater than 7'); </script>";
                     }
                     else
                     {
                     	$pass1=$_POST["pass"];
                     }
                }
                else
                {
                    echo "<script> alert('New password must contain special character'); </script>";
                }
      }
      if(empty($_POST["Cpass"]))  
      {  
          if(empty($_POST["pass"]))
          {
          	$pass1=$_SESSION["spass"];
          }
          else
          {
          	echo "<script> alert('Write the confirm password'); </script>";
          }
      } 
      else
          {
               if(strcmp($_POST["Cpass"],$_POST["pass"])!=0)
               {
                    echo "<script> alert('Not matched with new password. Please rewrite'); </script>";
               }
               else
               {
               	$pass1=$_POST["Cpass"];
               }
          }
      if(empty($_POST["gender"]))  
      {  
          $gender1=$_POST["sgender"];
      } 
      else
      {
      	$gender1=$_POST["gender"];
      }
     if(empty($_POST["dob"]))  
      {  
          $dob1=$_POST["dob"];
      } 
      else
      {
      	$dob1=$_SESSION["sgender"];
      }
        

           


          $servername = "localhost";
          $username = "root";
          $password = "";               
          $dbname = "seller";


          $email1=$_SESSION['semail'];

          
              
               $conn = mysqli_connect($servername, $username, $password, $dbname);
              
               if (!$conn) {
                 die("Connection failed: " . mysqli_connect_error());
               }

               $sql = "UPDATE userinfo SET Name='$name1', Password='$pass1', Gender='$gender1', Date_of_birth ='$dob' WHERE Email ='$email1' ";


               if (mysqli_query($conn, $sql)) {
                 mysqli_close($conn);
                 header("Location:http://localhost:8081/final/profile.php");
               } else {
                 echo "Error connecting to database: " . mysqli_error($conn);
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
          }
     </style> 
      </head>  
      <body> 
          <ul>
            <li><a href="http://localhost:8081/final/dashboard.php">Home</a></li>
            <li><a href="http://localhost:8081/final/llogin.php">Login</a></li>
            <li><a href="http://localhost:8081/final/registration.php">Registration</a></li>
            <li><a href="#about">About</a></li>
          </ul>
 
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Edit profile</h3><br />                 
                <form method="post">  
                       
                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name" class="form-control" /><br />  
                     <label>Password</label>
                     <input type="password" name = "pass" class="form-control" /><br />
                     <label>Confirm Password</label>
                     <input type="password" name = "Cpass" class="form-control" /><br />

                    <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label><br>

                     <legend>Date of Birth:</legend>
                     <input type="date" name="dob"><br><br>
                    </fieldset> 
                     
                     <input type="submit" name="submit" value="submit" class="btn btn-info" /><br />                       
                       
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