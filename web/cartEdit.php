<?php

	$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
	if ($conn -> connect_error){
		die("Connection failed:". $conn -> connect_error);
	}
	else{
	if(empty($_POST['id']) || empty($_POST['quantity'])){
		$alert =  "<script>alert('Please fill up all fields.'); location.href = 'cart-edit.php' </script>";
		echo $alert;
	
	}
	else{
		$ID = $_POST['id'];
	$Quantity = $_POST['quantity'];
	$query = "SELECT ProductPrice FROM cart WHERE CartId = $ID  " ;
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	
	$price = $row['ProductPrice'];
	
	
	$total = $Quantity * $price;
	
	$query = "UPDATE cart SET Quantity = '$Quantity', TotalAmount = '$total' WHERE CartId = '$ID'  " ;
	$result = mysqli_query($conn, $query);

		
			header('location: cart-edit.php?m=1');
		
	
	}
}	
	
	

?>