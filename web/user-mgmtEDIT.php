<?php

	$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
	if ($conn -> connect_error){
		die("Connection failed:". $conn -> connect_error);
	}
	
	$ID = $_POST['id'];
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Address = $_POST['address'];
	$Contact = $_POST['contact'];
	
	$query = "UPDATE customer SET CustomerName = '$Name', CustomerEmail = '$Email', CustomerAddress = '$Address', CustomerContactNo = '$Contact' WHERE CustomerId = $ID " ;
	$result = mysqli_query($conn, $query);
	
	if($result){
		header("Location: user-mgmt-edit.php?m=1");
	}
	else {
		die(mysqli_error($conn));
	}

?>