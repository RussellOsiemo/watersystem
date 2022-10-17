<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart</title>
	 <!-- Bootstrap CSS -->
	 <link rel="stylesheet" href="css/bootstrap.min.css" >
	<link href="css/bootstrap.min.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js" ></script>
	<!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body class="bg bg-dark">
	<div class="container">
		<div class="row">
			<div class="row-title">
				<h1 class="justify-content-center text-light center-align align-self-center">My Cart</h1>
				<a href="index.php" class="btn btn-success">Continue Shopping</a>
			</div>
			<div class="col-lg-8 border-success box-shadow card-body bg-light mt-5 justify-content-center">
				<table  id="example2" class="table-light table-bordered table-hover">
          <thead class="text-center">
     <tr>  
      <th scope="col">serial No.</th>
      <th scope="col">item name</th>
      <th scope="col">item price</th>
      <th scope="col">quantity</th>
      <th scope="col">Remove Item</th>
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
							<td><a href='delete.php?item_name=<?php echo $value['item_name']; ?>' class="btn btn-danger">Delete</a></td>
						<?php
					}

				}

          						
		  	}
		  	?>
		  	<tr>
		  		<td colspan="4" self-align="right">Total</td>
		  		<td><?php echo $total;
				//store the total in a session variable
				$_SESSION['total'] = $total;
		  		
				?></td>
		  	</tr>
	
          
 					 </tbody>
				</table>
				<div class="form-check">
					<form action="checkout.php" method="post">
  				<input class="form-check-input" type="radio" name="radiobutton" id="flexRadioDefault2" value="cash on delivery" checked>
  						<label class="form-check-label" for="flexRadioDefault2">
    						Cash on Delivery
  				</label>
				<br>
				<p>Or</p>
				<!--add   -->
				<input class="form-check-input" type="radio" name="radiobutton" id="flexRadioDefault2" value="lipa na mpesa" >
  						<label class="form-check-label" for="flexRadioDefault2">
    						Lipa na Mpesa to 123464 and send the Mpesa code in the input below
  				</label>
				<br>
				<input type="text" name="mpesacode" class="form-control" placeholder="Enter Mpesa Code for confirmation">
					</div>
					<button class="btn btn-primary btn-block" name= "submit">Make Purchase</button>
				</form>
				</div>
				<?php
				?>
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
				<form>
			
			</div>
		</div>
	</div>
	
    <script src="js/bootstrap.min.js" ></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>