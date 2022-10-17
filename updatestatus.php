<?php
require_once "config.php";
//update the status of the payment
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "UPDATE payment SET status = 'approved' WHERE id = '$id'";
    if(mysqli_query($link, $sql)){
        header("location: adminrecords.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

?>