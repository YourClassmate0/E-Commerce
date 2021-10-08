<?php
session_start();
if (isset($_SESSION['CustomerEmail']) && isset($_SESSION['CustomerPassword'])){
		
	}
	else{
		header("location: userlogin.php");
	}	
if(isset($_POST['cartid'])){	
	$_SESSION['cart'] = $_POST['cartid'];
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Checkout Items</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3">
				<div class="container-fluid">
					<a class="navbar-brand" href="userhomepage.php" style = "margin-right: 250px; margin-left: 50px; font-size: 20px;">LOGO</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
							    <a class="nav-link active " aria-current="page" href="userhomepage.php"style=" font-size: 20px; margin-right: 500px;">Home</a>
							</li>
						</ul>
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0" style = "margin-right: 75px;">
							<li class="nav-item">
							    <a class="nav-link active " aria-current="page" href="cart.php" style="margin-right:50px;font-size: 20px;">Cart</a>
							</li>
							<div id = "avatar"></div>
							<li class="nav-item dropdown ">
							    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style=" font-size: 20px;">
									<?php
								$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
								if ($conn -> connect_error){
									die("Connection failed:". $conn -> connect_error);
								}
								$custId = $_SESSION['CustomerId'];
								
								$sql = "SELECT CustomerName FROM customer WHERE CustomerId=$custId ";
									$result = mysqli_query($conn, $sql);
								
									$row = mysqli_fetch_assoc($result);
									
									$custname = $row['CustomerName'];
									echo $custname;
								 ?>
							    </a>
							    <ul class="dropdown-menu me-auto" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="account.php">Account</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="userOut.php?logout">Logout</a></li>
							    </ul>
							</li>
					    </ul>
					</div>
				</div>
			</nav>
		</header>
		
		<div class = "cart-checkout">
		<div>
			<div class = "breadcrumbs">
				<h4><a href="userhomepage.php">Home</a>><a href="cart.php">Cart</a>><a href="cart-checkout.php">Checkout Items</a>><a href="insert-orders.php">Confirm</a></h4>
			</div>

		</div>
			<div class = "table-container">
			<form method = "POST" action = "payment.php">
					<h2 class = "cart-title">Confirm Checkout Items</h2>
					
				<table class = "table-content">
				<thead>
					<tr>
						<td>Product Name</td>
						<td>Product Price</td>
						<td>Quantity</td>
						<td>Total Amount</td>
					</tr>
				</thead>
				<tbody>
					<?php
	
	
	 $conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
	 if (mysqli_connect_errno()) {
        echo 'Failed to connect to MySQL server: ' . mysqli_connect_error();   
	}
	else{
	if(empty($_POST['cartid'])){
		$alert =  "<script>alert('Please choose items to checkout.'); location.href = 'cart-checkout.php' </script>";
		echo $alert;
		
	}
	else{
		if(isset($_POST['checkout'])){
			$cartid = $_POST['cartid'];
		$total = 0;
		foreach($cartid as $id){
				$CartID = $id;
				$sql = "SELECT ProductName, ProductPrice, Quantity, TotalAmount FROM cart WHERE CartId=$id ";
				$result = mysqli_query($conn, $sql);
			
				$row = mysqli_fetch_assoc($result);
				
				$name = $row['ProductName']; 
				$p = $row['ProductPrice'];
				$quantity = $row['Quantity'];
				$price = $row['TotalAmount'];
				$total = $total + $row['TotalAmount'];
				
				?>
				<tr>
					<td><?php echo $name ?></td>
					<td><?php echo $p ?></td>
					<td><?php echo $quantity ?></td>
					<td><?php echo $price ?></td>
				</tr>
				
				<?php
			//	$query = "INSERT INTO orders (OrderId,Quantity,TotalAmount) VALUES ('$cart','$quantity','$total')";
			//	$query_run = mysqli_query($conn, $query);
				
		}	
			echo "<tr><th colspan =3>"."Total:"."<td>". $total ."</td>"."</th></tr>";
		}
	}
	}		
	?>
												
				</tbody>
				</table>	
					<script>
						function text(x) {
							if (x == 0) document.getElementById("proof").style.display = "block";
							else document.getElementById("proof").style.display = "none";
							return;
						}
					</script>	
					</form>
						<div class = "payment-form">
		<form method = "POST" action = "confirm-payment.php" enctype="multipart/form-data">
		<h2>Payment</h2>
		<div class = "radio-buttons">
			<label class="radio-inline">
				<input type="radio" name="choice" onclick = "text(0)" value = "Gcash" checked> Gcash
			</label>
			<label class="radio-inline">
				<input type="radio" name="choice" onclick = "text(0)" value = "Paymaya"> Paymaya
			</label>
			<label class="radio-inline">
				<input type="radio" name="choice" onclick = "text(0)" value = "BankXXX"> BankXXX
			</label>
			<label class="radio-inline">
				<input type="radio" name="choice" onclick = "text(1)" value = "Cash on Delivery"> Cash on Delivery
			</label>
		</div>
		<div class="proof"  id = "proof">
			<label for="pro">Proof of Payment</label>
			<input class="pop" type="file" id="pro" name="proof" >
		</div>
		<center class = "inputs">
			<label class = "name">
				Name </br>
				<input type="input" placeholder = "Name" name="name"> 
			</label> </br>
			<label class = "name">
				Contact No. </br>
				<input type="input" placeholder = "Contact no." name="contact"> 
			</label> </br>
			<label class = "name">
				Address </br>
				<input type="input" placeholder = "Address" name="address"> 
			</label> </br>
		</center>
		<center class = "payment-buttons">
			<div class = "checkout-button">
				<button name = "check" class = "btn-checkout" type = "submit" >Checkout</button>
			</div>
			<div class = "cancel-button">
				<button onclick = "cancelFunction()"class = "btn-cancel" type = "button"> Cancel</button>
			</div>
		</center>
	
		</form>
		</div>
			</div>
		</div>
			
	

		<footer>
			<div class = "footer-content">
				<div class = "contact">
					<p class = "footer-title">Contact Us</p>
					<ul class = "contacts" style = "list-style: none;">
						<li><i class="fas fa-phone"></i> &nbsp; 09771234567</li>
						<li><i class="fas fa-map-marked-alt"></i> &nbsp; 123 A XXXX Street Brgy. YYYYY ZZZZZ City</li>
						<li><i class="fas fa-envelope"></i> &nbsp; ecommerce@gmail.com</li>
					</ul>
				</div>
				<div class = "social">
					<p class = "footer-title">Visit Our Social Media Sites</p>
					<div class = "icons">
					<div class = "icon">
						<i class="fab fa-facebook fa-3x"></i>
					</div>
					<div class = "icon">
						<i class="fab fa-youtube fa-3x"></i>
					</div>
					<div class = "icon">
						<i class="fab fa-instagram fa-3x"></i>
					</div>
					<div class = "icon">
						<i class="fab fa-twitter fa-3x"></i>
					</div>
					</div>
				</div>
			</div>
		</footer>
	</body>
	
</html>
<script>
	function cancelFunction() {
        window.location = 'cart-checkout.php';
    }
</script>