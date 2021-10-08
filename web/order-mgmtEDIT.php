<?php

	$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
	if ($conn -> connect_error){
		die("Connection failed:". $conn -> connect_error);
	}
	
	$OrderID = $_POST['orderid'];
	$CustomerID = $_POST['customerid'];
	$ProductName = $_POST['name'];
	$ProductPrice = $_POST['price'];
	$Quantity = $_POST['quantity'];
	$TotalAmount = $_POST['amount'];
	$OrderDate = $_POST['date'];
	
	$query = "UPDATE orders SET CustomerId = '$CustomerID', ProductName = '$name', ProductPrice = '$ProductPrice', Quantity = '$Quantity', OrderDate = '$OrderDate' WHERE OrderId = '$OrderID' " ;
	$result = mysqli_query($conn, $query);
	
	if($result){
		header("Location: order-mgmt-edit.php");
	}
	else {
		die(mysqli_error($conn));
	}

?>