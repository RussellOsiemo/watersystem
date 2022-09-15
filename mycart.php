<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="row-title">
				<h7>My Cart</h7>
				<a href="index.php" class="btn btn-primary">Continue Shopping</a>
			</div>
			<div class="col-lg-8">
				<table class="table">
          <thead class="text-center">
     <tr>  
      <th scope="col">serial No.</th>
      <th scope="col">item name</th>
      <th scope="col">item price</th>
      <th scope="col">quantity</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="text-center">
  			<?php
			session_start();
  			$total=0;
          	if (isset($_SESSION['cart'])) 
          	{
				//deal with the undefined array ke error 
				//if the cart is empty, the array is undefined-;
				//so we need to check if the array is empty or not
				//if it is empty, we need to create an empty array
				//if it is not empty, we need to decode the json file
				//and store it in the array
				$cartarray = $_SESSION['cart'];
				if (empty($cartarray)) {
					$cartarray = array();
				} else {
					//fetch data from cart.json and store as an array
					$cartarray = file_get_contents("cart.json");
					$cartarray = json_decode($cartarray, true);
					//loop through the array and display the items
					 $totalarray = array();
					foreach ($cartarray as $key => $value)
					{
						$total = $total + $value['price']*$value['quantity'];
						?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['item_name']; ?></td>
							<td><?php echo $value['price']; ?></td>
							<td><?php echo $value['quantity']; ?></td>
							<td><a href='delete.php?item_name=<?php echo $value['item_name']; ?>'>Delete</a></td>
						<?php
					}

				}

          						
		  	}
		  	?>
		  	<tr>
		  		<td colspan="4" self-align="right">Total</td>
		  		<td><?php echo $total; ?></td>
		  	</tr>
	
          
 					 </tbody>
				</table>
			</div>
			<div class="col-lg-3">
				
				<div class= "total">
					<style>
						.total{
							padding: 30px;
							margin-top: 00px;
							margin-bottom: 0;
						}
					</style>
				<h4>Total:</h4>
				<h6><?php echo $total ?></h6>
				<!-- <form>
			<div class="form-check">
  				<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  						<label class="form-check-label" for="flexRadioDefault2">
    						Cash on Delivery
  				</label>
					</div>
					<button class="btn ntn-primary btn-block">Make Purchase</button>
				</form> -->
				</div>
			</div>
		</div>
	</div>
</body>
</html>