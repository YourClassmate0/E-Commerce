<!DOCTYPE HTML>
<html>
	<head>
		<title>Category</title>
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
					<a class="navbar-brand" href="index.php" style = "margin-right: 250px; margin-left: 50px; font-size: 20px;">LOGO</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
							    <a class="nav-link active " aria-current="page" href="index.php" style=" font-size: 20px; margin-right: 500px;">Home</a>
							</li>
						</ul>
						<ul class="navbar-nav me-auto mb-2 mb-lg-0" ">
							<li class="nav-item">
							    <a class="nav-link active " aria-current="page" href="loginpage.html" style=" font-size: 20px;">Login</a>
							</li>
					    </ul>
					</div>
				</div>
			</nav>
		</header>
		<div class = "breadcrumbs">
				<h4><a href="index.php">Home</a>><a href="">Categories</a>
		</div>
		<div class = "container py-5">
			<div class = "row mt-4">
				<?php
				$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
				if(isset($_GET['id'])){
				$CategoryID = $_GET['id'];
				$sql = "SELECT CategoryName FROM category WHERE CategoryId=$CategoryID ";
				$result = mysqli_query($conn, $sql);

				$row = mysqli_fetch_assoc($result);
				
				$CategoryNAME  = $row['CategoryName']; 
				}
				?>
				<center><h1 style = "margin-bottom: 20px;"><?php echo $CategoryNAME ?></h1></center>
				
					<?php
						$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
						if ($conn -> connect_error){
							die("Connection failed:". $conn -> connect_error);
						}
						
						$sql = "SELECT ProductId, ProductImg, ProductName, ProductPrice  FROM product WHERE CategoryId = $CategoryID ORDER BY ProductId ASC ";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while ($row = $result -> fetch_assoc()) {
								?>
								<div class = "col-md-4">
									<div class = "card" >
										<div class = "card-body" >
											<center><a href='noUserItemPage.php?id=<?php echo  $row["ProductId"] ?>'><?php echo '<img src = "data:image;base64,'.base64_encode($row['ProductImg']).'" style = "width: 150px; height: 150px;" > ';?></a></center>
											<center><h2 class = "card-title"><a href='noUserItemPage.php?id=<?php echo  $row["ProductId"] ?>' style = "font-size:30px; text-decoration:none; color: black;"><?php echo $row['ProductName']?></a> </h2></center>
											<center><h2 class = "card-title"><?php echo "P".$row['ProductPrice']?> </h2></center>
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
			<div class = "cat-button"align = "right">
				<style>
				.b-btn{
					background: white;
					color: black;
					border: 2px solid black;
					border-radius: 5px;
					font-size: 20px;
					margin-bottom: 20px;
					width: 100px;
				}
				.b-btn:hover {
					background: #373737;
					color: white;
				}
				</style>
				<a href = "index.php"><button class = "b-btn">Back</button></a>
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