<!DOCTYPE HTML>
<html>
	<head>
		<title>Add to Cart</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
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
								User
							    </a>
							    <ul class="dropdown-menu me-auto" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="account.html">Account</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="logoff.php">Logout</a></li>
							    </ul>
							</li>
					    </ul>
					</div>
				</div>
			</nav>
		</header>
		
		<div class = "item-container">
			<h2>ITEM</h2>
			<form enctype = "multipart/form-data" >
			<?php
				$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
				if (mysqli_connect_errno()) 
					echo 'Failed to connect to MySQL server: ' . mysqli_connect_error();   
				else{
					$CartID = generatePrimaryKey($conn);
				}
				$ProductID = $_GET['id'];
				$sql = "SELECT ProductId, ProductImg, ProductName, ProductPrice, ProductDescription FROM product  WHERE ProductId=$ProductID ";
				$result = mysqli_query($conn, $sql);

				$row = mysqli_fetch_assoc($result);
				
				$ProductIMG  = '<img src = "data:image;base64,'.base64_encode($row['ProductImg']).'" style = "width: 450px; height: 550px;" > ';
				$ProductNAME  = $row['ProductName']; 
				$ProductPRICE  = $row['ProductPrice'];
				$ProductDESC = $row['ProductDescription'];
				
		}
		  function generatePrimaryKey($conn) {
        $primaryKey = "";
        while (checkPrimaryKey($primaryKey, $conn)) {
            $randomNumber = rand(1, 999999);
            if ($randomNumber >= 1 && $randomNumber <= 9) 
                $primaryKey = "00000" . $randomNumber;
            else if ($randomNumber >= 10 && $randomNumber <= 99) 
                $primaryKey = "0000" . $randomNumber;
            else if ($randomNumber >= 100 && $randomNumber <= 999) 
                $primaryKey = "000" . $randomNumber;
            else if ($randomNumber >= 1000 && $randomNumber <= 9999) 
                $primaryKey = "00" . $randomNumber;
            else if ($randomNumber >= 10000 && $randomNumber <= 99999) 
                $primaryKey = "0" . $randomNumber;
            else
                $primaryKey = (string) $randomNumber;
        }

        return ($primaryKey);
    }

    function checkPrimaryKey($primaryKey, $conn) {
        $exist = false;      
        if (strlen($primaryKey) == 0)
            $exist = true;
        else {
            $query = "SELECT AdminId FROM admin WHERE AdminId = '$primaryKey'";
            $result = mysqli_query($conn, $query); 
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result))
                    $exist = true;
            }
        }

        return $exist;
    }
		?>
			<div class = "row">
				<div class = "col-2" >
					<?php echo $ProductIMG ?>
				</div>
				<div class = "col-2">
					<h1><?php echo $ProductNAME ?></h1>
					<h3><?php echo "P ".$ProductPRICE.".00" ?></h3>
					<h2>Item Description</h2>
					<p><?php echo $ProductDESC ?></p>
					<h2>Quantity</h2>
					
					<div class = "buttons">
				<div class = "confirm-button">
					<div class = "cart-button">
						<form action = "add.php" method ="POST">
							<button  class = "btn cart " type = "submit" >Confirm</button><>
						</form>
					</div>
					
					
				</div>
					<div class = "checkout-button">
						<button class = "btn check " type = "button"><a href='itemPage.php?id=<?php echo  $row["ProductId"] ?>' style="text-decoration:none; color:black;">Cancel</a></button>
					</div>
				</div>		
					
				</div>
				
			</div>
		</div>	
		</form>
		
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
		window.location.href = 'itemPage.php'
	}
	$(document).ready(function(e) {
	$('#checkModal').on('hidden.bs.modal', function(e) {
    window.location.href = 'userhomepage.php'
	});
	});
</script>