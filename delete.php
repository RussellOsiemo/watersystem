<?php
session_start();
//fetch data from cart.json and store as an array
$cartarray = file_get_contents("cart.json");
//check if the delete button was clicked
if (isset($_GET['delete'])) {
    //get the index of the item to be deleted
    $index = $_GET['delete'];
    //convert the json data into an array
    $cartarray = json_decode($cartarray, true);
    //remove the item from the array
    unset($cartarray[$index]);
    //reindex the array
    $cartarray = array_values($cartarray);
    //convert the array back to json
    $cartarray = json_encode($cartarray);
    //replace the cart.json with the updated cart
    file_put_contents("cart.json", $cartarray);
    //store the updated cart.json in the session
    $_SESSION['cart'] = $cartarray;
    //redirect to mycart.php
    header("location: mycart.php");
}
?>