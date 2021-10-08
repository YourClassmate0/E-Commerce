<!DOCTYPE HTML>
<html>
	<head>
		<title>All User Orders</title>
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
					<a class="navbar-brand" href="adminpage.html" style = "margin-right: 250px; margin-left: 50px; font-size: 20px;">LOGO</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0" style = "margin-right: 75px;">
							
							<div id = "admin"></div>
							<li class="nav-item dropdown ">
							    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style=" font-size: 20px;">
								Admin
							    </a>
							    <ul class="dropdown-menu me-auto" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="#">Account</a></li>
									<li><a class="dropdown-item" href="#">Settings</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="logoffadmin.php">Logout</a></li>
							    </ul>
							</li>
					    </ul>
					</div>
				</div>
			</nav>
		</header>
		<div class = "cart">
		<div>
			<div class = "breadcrumbs">
				<h4><a href="adminpage.html">Dashboard</a>><a href="user-orders.php">Customer's Orders</a></h4>
			</div>
			<h2 class = "cart-title">Customer's Orders</h2>
			<div class = "admin-btn" style = "margin-right:70px;">
				<a href="usr-ordr-remove.php"><button class="btn remove">Delete Order</button></a>
				<a href="usr-ordr-edit.php"><button class="btn edit">Edit Order</button></a></br></br></br>
			</div>
		</div>
			<div class ="table-container">
				<table class = "table-content">
				<thead>
					<tr>
						<td>No.</td>
						<td>User ID</td>
						<td>Username</td>
						<td>Product Name</td>
						<td>Quantity</td>
						<td>Price</td>
						<td>Order Date</td>
						<td>Deliver Date</td>
						<td>Status</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>####</td>
						<td>AAAA</td>
						<td>BBBB</td>
						<td>CCCC</td>
						<td>DDDD</td>
						<td>EEEE</td>
						<td>FFFF</td>
						<td>GGGG</td>
						<td>HHHH</td>
					</tr>
					<tr>
						<td>####</td>
						<td>AAAA</td>
						<td>BBBB</td>
						<td>CCCC</td>
						<td>DDDD</td>
						<td>EEEE</td>
						<td>FFFF</td>
						<td>GGGG</td>
						<td>HHHH</td>
					</tr>
					<tr>
						<td>####</td>
						<td>AAAA</td>
						<td>BBBB</td>
						<td>CCCC</td>
						<td>DDDD</td>
						<td>EEEE</td>
						<td>FFFF</td>
						<td>GGGG</td>
						<td>HHHH</td>
					</tr>
					<tr>
						<td>####</td>
						<td>AAAA</td>
						<td>BBBB</td>
						<td>CCCC</td>
						<td>DDDD</td>
						<td>EEEE</td>
						<td>FFFF</td>
						<td>GGGG</td>
						<td>HHHH</td>
					</tr>
					<tr>
						<td>####</td>
						<td>AAAA</td>
						<td>BBBB</td>
						<td>CCCC</td>
						<td>DDDD</td>
						<td>EEEE</td>
						<td>FFFF</td>
						<td>GGGG</td>
						<td>HHHH</td>
					</tr>
					<tr>
						<td>####</td>
						<td>AAAA</td>
						<td>BBBB</td>
						<td>CCCC</td>
						<td>DDDD</td>
						<td>EEEE</td>
						<td>FFFF</td>
						<td>GGGG</td>
						<td>HHHH</td>
					</tr>
					<tr>
						<td>####</td>
						<td>AAAA</td>
						<td>BBBB</td>
						<td>CCCC</td>
						<td>DDDD</td>
						<td>EEEE</td>
						<td>FFFF</td>
						<td>GGGG</td>
						<td>HHHH</td>
					</tr>
					<tr>
						<td>####</td>
						<td>AAAA</td>
						<td>BBBB</td>
						<td>CCCC</td>
						<td>DDDD</td>
						<td>EEEE</td>
						<td>FFFF</td>
						<td>GGGG</td>
						<td>HHHH</td>
					</tr>
					<tr>
						<td>####</td>
						<td>AAAA</td>
						<td>BBBB</td>
						<td>CCCC</td>
						<td>DDDD</td>
						<td>EEEE</td>
						<td>FFFF</td>
						<td>GGGG</td>
						<td>HHHH</td>
					</tr>
					<tr>
						<td>####</td>
						<td>AAAA</td>
						<td>BBBB</td>
						<td>CCCC</td>
						<td>DDDD</td>
						<td>EEEE</td>
						<td>FFFF</td>
						<td>GGGG</td>
						<td>HHHH</td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>
		
		<div class = "page-btn" style = "margin-left: 550px;">
			<span>1</span>
			<span>2</span>
			<span>3</span>
			<span>4</span>
			<span>5</span>
			<span>&#8594;</span>
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