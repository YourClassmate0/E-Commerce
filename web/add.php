<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
	 if (mysqli_connect_errno()) {
        echo 'Failed to connect to MySQL server: ' . mysqli_connect_error();   
	}
	else{
		$cart = generateCartKey($conn); 
		$_SESSION['id'] = $_SESSION['productid'];
		$_SESSION['name'] = $_SESSION['productname'];
		$_SESSION['price'] = $_SESSION['productprice'];

		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
		$price = $_SESSION['price'];
		
		$custId = $_SESSION['CustomerId'];

		if($_POST['quantity']){

		$quantity = $_POST['quantity'];

		}
		$total = $price * $quantity;
		
		$query = "INSERT INTO cart (CartId, ProductId, ProductName, ProductPrice, Quantity, TotalAmount, CustomerId) VALUES ('$cart','$id','$name','$price','$quantity','$total','$custId')";
		$query_run = mysqli_query($conn, $query);
		
		header('location: userhomepage.php?m=1');
		
	}
function generateCartKey($conn) {
        $primaryKey = "";
        while (checkCartKey($primaryKey, $conn)) {
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

    function checkCartKey($primaryKey, $conn) {
        $exist = false;      
        if (strlen($primaryKey) == 0)
            $exist = true;
        else {
            $query = "SELECT CartId FROM cart WHERE CartId = '$primaryKey'";
            $result = mysqli_query($conn, $query); 
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result))
                    $exist = true;
            }
        }

        return $exist;
    }
?>