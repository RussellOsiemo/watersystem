<?php
session_start();
//fetch data from cart.json and store as an array
$cartarray = file_get_contents("cart.json");
//convert the data into an array
$cartarray = json_decode($cartarray, true);
//delete the item with the specified item_name
$index = array_search($_GET['item_name'], array_column($cartarray, 'item_name'));
unset($cartarray[$index]);
//reindex the array
$cartarray = array_values($cartarray);
//convert the array back to json
$cartarray = json_encode($cartarray);
//store the json data in cart.json file
file_put_contents("cart.json", $cartarray);
//redirect to mycart.php
header("Location: mycart.php");

?>