<?php

session_start();

$con = mysqli_connect('localhost', 'root', '', 'watersystem');

mysqli_select_db($con, 'watersystem');

$name = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['number'];

$s = "select * From userregistration where name = '$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if ($num == 1) {
     ?>
     <script>window.alert("sign up failed");
            window.location.href='registration.php';
        </script>
    <?php
}
else{
    $reg = "insert into userregistration(name , email , password , phone_number) values ('$name' , '$email' , '$password' , '$phone_number')";
    mysqli_query($con, $reg);
    ?>
     <script>window.alert("Success");
            window.location.href='login.html';
        </script>
    <?php
}
?>