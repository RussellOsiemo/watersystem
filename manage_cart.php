<?php
session_start();
//fetch data from cart.json and store as an array 
// $index = "";
$cartarray = file_get_contents("cart.json");
if ($_SERVER["REQUEST_METHOD"]=="GET")
{
	if (isset($_GET['add'])) 
	{
		//get the data and store it in an array 
		$item_name = $_GET['item_name'];
		$price = $_GET['price'];
		$quantity = 1;
		//convert the data into an array
		$itemarray = array(
			'item_name' => $item_name,
			'price' => $price,
			'quantity' => $quantity
		);
		//convert to $cartarray to an array
		$cartarray = json_decode($cartarray, true);
		//check if the array is empty 
		if(empty($cartarray))
		{
			//if it is empty, create an empty array
			$cartarray = array();
			//add the item to the array at -1 index
			$cartarray[] = $itemarray;
			//convert the array back to json
			$cartarray = json_encode($cartarray);
			//store the json data in cart.json file
			file_put_contents("cart.json", $cartarray);
		}
		//if the array is not empty 
		else
		{
			//check if the item is already in the cart
			$index = array_search($item_name, array_column($cartarray, 'item_name'));
			//if the item is not in the cart
			if($index === false)
			{
				//add the item to the array at -1 index
				$cartarray[] = $itemarray;
				//convert the array back to json
				$cartarray = json_encode($cartarray);
				//store the json data in cart.json file
				file_put_contents("cart.json", $cartarray);
			}
			//if the item is in the cart
			else
			{
				//increase the quantity of the item by 1
				$cartarray[$index]['quantity']++;
				//convert the array back to json
				$cartarray = json_encode($cartarray);
				//store the json data in cart.json file
				file_put_contents("cart.json", $cartarray);
			}
		}
		//display contents of the cart.json 
		//  echo $cartarray;
		//store the updated cart.json in the session
		$_SESSION['cart'] = $cartarray;
		//redirect to index.php
		header("location: index.php");

		
	}
}
?>