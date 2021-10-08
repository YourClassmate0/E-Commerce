<?php
    session_start();
	if (isset($_SESSION['AdminEmail']) && isset($_SESSION['AdminPassword'])){
		
	}
	else{
		header("location: adminlogin.php");
	}	

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>User Management</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
		<script src = "jquery-3.6.0.min.js"></script>
		<script src = "sweetalert2.all.min.js"></script>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3">
				<div class="container-fluid">
					<a class="navbar-brand" href="adminpage.php" style = "margin-right: 250px; margin-left: 50px; font-size: 20px;">LOGO</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0" >
							<li class="nav-item">
							    <a class="nav-link active " aria-current="page" href="userhomepage.html"style=" font-size: 20px; margin-right: 500px;"></a>
							</li>
						</ul>
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0" style = "margin-right: 75px;">
							<li class="nav-item">
							    <a class="nav-link active " aria-current="page" href="cart.php" style="margin-right:50px;font-size: 20px;"></a>
							</li>
							<div id = "admin"></div>
							<li class="nav-item dropdown ">
							    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style=" font-size: 20px;">
								Admin
							    </a>
							    <ul class="dropdown-menu me-auto" aria-labelledby="navbarDropdown">
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="adminOut.php?logout">Logout</a></li>
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
					text: 'Delete Successful'
				})
			}
		</script>
		
		
		<div class = "cart">
		<div align ="LEFT">
			<div class="breadcrumbs">
			<h4><a href="adminpage.php">Dashboard</a>><a href="user-mgmt.php">User Management</a>><a href="user-mgmt-delete.php">Delete</a></h4>
			</div>
			<h4>User Management</h4>


			
			<a href="user-mgmt.php"><button class="btn remove">Back</button></a>
			<form action = "user-mgmtDELETE.php" method = "post" >
			<button type= "submit" class="btn-delete">Delete User</button>
			<table>
			</table>
		</div>
			<div align="center">
			<style>
				table, th, td {
					 border:5px solid black;
				}
			</style>
				<br><br>

				<div align="LEFT">

				&nbsp&nbsp Instructions on how to use<br>
				&nbsp&nbsp 1. Enter the entry number(No.) of the entry that is to be Deleted.<br>
				&nbsp&nbsp 2. Click on the "Delete User" button.<br>
				&nbsp&nbsp 3. You are done!<br><br>
				</div>
				
				<table>
				<tr>
				<td style="background-color:#979797;"><h2>User ID:</h2></td><td><input type="text" name = "id" id = "id"></td>
				</tr>
				</tr>
				</table>
				<br><br>
				</form>


				<div class="table-container">
				<table class="table-content">
				<thead>
				<tr>
				<td><h2><b>User ID</b></h2></td>
				<td><h2><b>Name</b></h2></td>
				<td><h2><b>Email</b></h2></td>
				<td><h2><b>Address</b></h2></td>
				<td><h2><b>Contact No.</b></h2></td>
				</tr>
				</thead>
				<tbody>
				<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "ecommerce";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}


				$sql = "SELECT * FROM customer";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					 // output data of each row
					 while($row = $result->fetch_assoc()) {
						echo "<tr><td>".$row["CustomerId"]."</td><td>".$row["CustomerName"]."</td><td>".$row["CustomerEmail"]."</td><td>".$row["CustomerAddress"]."</td><td> ".$row["CustomerContactNo"]."</td></tr>";
					}
					echo "</table>";
					} else {
					  echo "0 results";
					}		
				$conn->close();
				?>

				</tbody>
				</table>
				</div>
				<br>
				
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