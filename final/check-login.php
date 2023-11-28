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

?>
<?php
include 'index.php';
$aaa=0;
    $uusername = isset($_POST['username']) ? $_POST['username'] : '';
    $upassword = isset($_POST['password']) ? $_POST['password'] : '';

    $ok = true;
    $messages = array();

    if ( !isset($uusername) || empty($uusername) ) {
        $ok = false;
        $messages[] =  $username ;
    }

    if ( !isset($upassword) || empty($upassword) ) {
        $ok = false;
        $messages[] = 'Password cannot be empty!';
    }

    if ($ok) {
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
          $sql= "SELECT Name,Email,Password,Gender,Date_of_birth FROM UserInfo";
          $sql_query=mysqli_query($conn,$sql);

          while($data=mysqli_fetch_array($sql_query))
          {
               $nameid=$data['Name'];
               $mailid=$data['Email'];
               $passid=$data['Password'];
               $genderid=$data['Gender'];
               $dobid=$data['Date_of_birth'];

               if($mailid==$_POST['tt'] && $passid==$_POST['yy'])
               {
                    $_SESSION["sname"]=$nameid;
                    $_SESSION["semail"]=$mailid;
                    $_SESSION["sgender"]=$genderid;
                    $_SESSION["sdob"]=$dobid;
                    $aaa=1;
                    mysqli_close($conn);
                    header("Location:http://localhost:8080/final/dashboard.php");
                    break;
               }
               else
               {
               }
          }
          if($aaa===1){
                $ok = true;
                    $messages[] = 'Successful login!';
          }
          else{
                $ok = false;
                    $messages[] = 'Incorrect username/password combination!';
          }
        
    }

    echo json_encode(
        array(
            'ok' => $ok,
            'messages' => $messages
        )
    );

?>