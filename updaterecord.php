<?php
require_once "config.php";
//get details from the payment table
$sql = "SELECT * FROM payment";
$result = mysqli_query($link, $sql);
//update given id status 
if(isset($_POST['update'])){
    $status = $_POST['status'];
    $id = $_POST['id'];
    $sql = "UPDATE payment SET status = '$status' WHERE id = '$id'";
    if(mysqli_query($link, $sql)){
        echo "<script>alert('Record updated successfully.')</script>";
        echo "<script>window.location.href='adminrecords.php'</script>";
    } else{
        echo "<script>alert('ERROR: Could not able to execute $sql.')</script>" . mysqli_error($link);
    }
}
?>