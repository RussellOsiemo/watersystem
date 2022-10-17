<?php

session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header('location:index.php');
      exit;
  }

$con = mysqli_connect('localhost', 'root', '', 'watersystem');

mysqli_select_db($con, 'watersystem');

$email = $_POST['email'];
$password = $_POST['password'];


$s = "select * From userregistration where email = '$email' && password ='$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if ($num == 1) {

   //set session variables 
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    
    $_SESSION['loggedin'] = true;
       ?>
     <script>window.alert("Welcome");
            window.location.href='index.php';
        </script>
    <?php
}
else{
    ?>
     <script>window.alert("sign in error!!");
            window.location.href='login.html';
        </script>
    <?php
     $_SESSION['name'] = $name;
     $_SESSION['email'] = $email;
     $_SESSION['password'] = $password;
     $_SESSION['phone_number'] = $phone_number;
}
?>