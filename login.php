<?php

session_start();

$con = mysqli_connect('localhost', 'root', '', 'watersystem');

mysqli_select_db($con, 'watersystem');

$email = $_POST['email'];
$password = $_POST['password'];


$s = "select * From userregistration where email = '$email' && password ='$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if ($num == 1) {
       $_SESSION['name'] = $name;
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
}
?>