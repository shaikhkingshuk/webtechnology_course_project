<?php  
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
                echo "<script> alert('Please enter the name');
                return false; </script>";
           }
           else
           {
               if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])) 
               {
                    echo "<script> alert('Enter the name correctly'); return false; </script>";
               }
               else
               {

               }
           }
           if(empty($_POST["email"]))  
           {  
                echo "<script> alert('Please enter the email'); </script>"; 
           }
           else
           {
               if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
               {
                    echo "<script> alert('Email format is not validate'); </script>";
               }
           }  

      if(empty($_POST["pass"]))  
      {  
          echo "<script> alert('Enter a password'); </script>";
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
                }
                else
                {
                    echo "<script> alert('New password must contain special character'); </script>";
                }
      }
      if(empty($_POST["Cpass"]))  
      {  
          echo "<script> alert('Confirm password field cannot be empty'); </script>";  
      } 
      else
          {
               if(strcmp($_POST["Cpass"],$_POST["pass"])!=0)
               {
                    echo "<script> alert('Not matched with new password. Please rewrite'); </script>";
               }
          }
      if(empty($_POST["gender"]))  
      {  
          echo "<script> alert('Gender cannot be empty'); </script>"; 
      } 
     if(empty($_POST["dob"]))  
      {  
          echo "<script> alert('Date of birth cannot be empty'); </script>";  
      }
      if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["Cpass"]) && !empty($_POST["gender"]) && !empty($_POST["dob"]))  
      {  

           $name1=$_POST['name'];
           $email1=$_POST['email'];
           $pass1=$_POST['Cpass'];
           $gender1=$_POST['gender'];
           $dob1=$_POST['dob'];


          $servername = "localhost";
          $username = "root";
          $password = "";               
          $dbname = "seller";

          
               // Create connection
               $conn = mysqli_connect($servername, $username, $password, $dbname);
               // Check connection
               if (!$conn) {
                 die("Connection failed: " . mysqli_connect_error());
               }

               // Create database
               $sql ="INSERT INTO UserInfo (Name, Email, Password, Gender, Date_of_birth)
               VALUES ('$name1', '$email1', '$pass1', '$gender1', '$dob1')"; 


               if (mysqli_query($conn, $sql)) {
                 mysqli_close($conn);
                 header("Location:http://localhost:8081/final/llogin.php");
               } else {
                 echo "Error creating database: " . mysqli_error($conn);
               }

                
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
            <li><a href="http://localhost:8081/final/home.php">Home</a></li>
            <li><a href="http://localhost:8081/final/llogin.php">Login</a></li>
            <li><a href="http://localhost:8081/final/registration.php">Registration</a></li>
            <li><a href="http://localhost:8081/final/logout.php"></a></li>
          </ul>
 
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Registration</h3><br />                 
                <form method="post">  
                       
                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name" class="form-control" /><br />  
                     <label>E-mail</label>
                     <input type="text" name = "email" class="form-control" /><br />
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