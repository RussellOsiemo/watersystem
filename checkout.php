<?php
session_start();
$name = $_SESSION['name'] ;
 $email = $_SESSION['email'];
 $password = $_SESSION['password'] ;
 $amount = $_SESSION['total'];
$con = mysqli_connect('localhost', 'root', '', 'watersystem');
//set timezone to Nairobi/ Africa
date_default_timezone_set('Africa/Nairobi');
mysqli_select_db($con, 'watersystem');
//date entered should be a timestamp date and the field disabled
$current_time = time(); 
$date_entered = date("Y-m-d",$current_time);
$mpesacode = "";
 if (isset($_POST['submit'])) {
  //get the radio button value
    $radio = $_POST['radiobutton'];
    if ($radio == "cash on delivery") {
      $mpesacode = "cash on delivery";
        $sql = "INSERT INTO payment (email, timestamp, mpesacode, amount,status) VALUES ('$email','$date_entered', '$mpesacode', '$amount', 'pending')";
        $result = mysqli_query($con, $sql);
        if ($result) {
          echo "<script>alert('Your order has been placed successfully, You will recieve a call shortly to get details on delivery')</script>";
    }
    //if the radio button is  lipa na mpesa
    }elseif ($radio == "lipa na mpesa") {
      //capture the input 
        $mpesacode = $_POST['mpesacode'];
      $sql = "INSERT INTO payment (email,timestamp, mpesacode, amount, status) VALUES ('$email','$date_entered', '$mpesacode', '$amount','pending')";
        $result = mysqli_query($con, $sql);
        if ($result) {
          echo "<script>alert('Your order has been placed successfully and will be approved shortly, You will recieve a call shortly to get details on delivery')</script>";
    }
    }
// //
 }
 
?>