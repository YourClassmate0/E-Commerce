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
		<title>Homepage</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
					text: 'Added to Cart Successfully'
				})
			}
		</script>
		<div class = "container py-5">
			<div class = "row mt-4">
				<center><h2 style = "margin-bottom: 20px;">Categories</h2></center>
			
					<?php
						$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
						if ($conn -> connect_error){
							die("Connection failed:". $conn -> connect_error);
						}
						
						$sql = "SELECT CategoryId,CategoryImg, CategoryName FROM category ORDER BY CategoryId ASC ";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while ($row = $result -> fetch_assoc()) {
								?>
								<div class = "col-md-4">
									<div class = "card">
										<div class = "card-body">
											<center><a href='user-clothe.php?id=<?php echo  $row["CategoryId"] ?>'><?php echo '<img src = "data:image;base64,'.base64_encode($row['CategoryImg']).'" style = "width: 315px; height: 250px; " > ';?></a></center>
											<center><h2 class = "card-title"><h4 class = "card-title"><a href='user-clothe.php?id=<?php echo  $row["CategoryId"] ?>' style = "font-size:30px; text-decoration:none; color: black;  "><?php echo $row['CategoryName']?></a><h4></h2></center>
											
										</div>
									</div>
								</div>
								<?php
							}
							echo "</table>";
						}
						else {
							echo "0 result";
						}
						
						$conn -> close();					
						
					?>	
					
				
					
				
			</div>
		</div>
		<div class = "container py-5">
			<div class = "row mt-4">
				<center><h2>Product List</h2></center>
			
					<?php
						$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');				
						if ($conn -> connect_error){
							die("Connection failed:". $conn -> connect_error);
						}
						
						$sql = "SELECT ProductId, ProductImg, ProductName, ProductPrice  FROM product ORDER BY ProductId ASC ";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while ($row = $result -> fetch_assoc()) {
								?>
								<div class = "col-md-4">
									<div class = "card" style = "margin-top: 20px;">
										<div class = "card-body">
											<center><a href='itemPage.php?id=<?php echo  $row["ProductId"] ?>'><?php echo '<img src = "data:image;base64,'.base64_encode($row['ProductImg']).'" style = "width: 150px; height: 150px; " > ';?></a></center>
											<center><h2 class = "card-title"><a href='itemPage.php?id=<?php echo  $row["ProductId"] ?>' style = "font-size:px; text-decoration:none; color: black;"><?php echo $row['ProductName']?></a> <h4></h2></center>
											<center><h2 class = "card-title"><?php echo "P".$row['ProductPrice']?> <h4></h2></center>
											
										</div>
									</div>
								</div>
								<?php
								
							}
							echo "</table>";
						}
						else {
							echo "0 result";
						}
						
						$conn -> close();					
						
					?>
							
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
