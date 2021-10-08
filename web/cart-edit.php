<?php
session_start();
if (isset($_SESSION['CustomerEmail']) && isset($_SESSION['CustomerPassword'])){
		
	}
	else{
		header("location: userlogin.php");
	}	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Cart</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
		<script src = "jquery-3.6.0.min.js"></script>
		<script src = "sweetalert2.all.min.js"></script>
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
		<?php if (isset($_GET['m'])) : ?>
			<div class = "flash-data" data-flashdata="<? = $_GET['m']; ?> " ></div>
		<?php endif; ?>
		<script>
			const flashdata = $('.flash-data').data('flashdata')
			if(flashdata) {
				Swal.fire({
					type: 'success',
					title: 'Success',
					text: 'Edit Successful'
				})
			}
		</script>
		<div class = "cart-edit">
		<div>
			<div class = "breadcrumbs">
				<h4><a href="userhomepage.php">Home</a>><a href="cart.php">Cart</a>><a href="cart-edit.php">Edit Items</a></h4>
			</div>
			<h2 class = "cart-title">Edit Items</h2>
			<div class = "cart-buttons">
			<form action = "cartEdit.php" method = "post" >
				<a href="cart.php"><button type = "button" class="btn back">Back</button></a>
				<button type = "submit" class="btn edit">Update</button></br></br></br></br>

				<div align ="center">
				<table class ="table-content">
				<thead>
					<tr>
					<td style="background-color:#979797;"><h2>Cart Id:</h2></td><td> <input type="text" name= "id" id = "id"></td>
					<td style="background-color:#979797;"><h2>Quantity:</h2></td><td> <input type="text" name= "quantity" id = "quantity"></td>
					</tr>
				</thead>
				</table>
				<br><br><br>
				</form>
		</div>
			<div class = "table-container">
				<table class = "table-content">
				<thead>
					<tr>
						<td>Cart Id</td>
						<td>Product Name</td>
						<td>Product Price</td>
						<td>Quantity</td>
						<td>Total Amount</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
						if ($conn -> connect_error){
							die("Connection failed:". $conn -> connect_error);
						}
						$custId = $_SESSION['CustomerId'];
						$sql = "SELECT cart.CartId, product.ProductName, product.ProductPrice, cart.Quantity, cart.TotalAmount FROM cart INNER JOIN product ON cart.ProductId = product.ProductId AND cart.CustomerId = '$custId'";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while ($row = $result -> fetch_assoc()) {
								echo "<tr><td>". $row["CartId"]."</td><td>". $row["ProductName"]."</td><td>". $row["ProductPrice"]."</td><td>". $row["Quantity"]."</td><td>". $row["TotalAmount"]. "</td></tr>";
							}
							echo "</table>";
						}
						else {
							echo "0 result";
						}
						
						$conn -> close();					
						
					?>
				</tbody>
				</table>		
			</div>
		</div>
		
		<footer>
			<div class = "footer-content"style = "margin-top: 150px;">
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