<?php 
session_start(); 
 $conn = mysqli_connect('localhost', 'root', '', 'ecommerce');

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: userlogin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: userlogin.php?error=Password is required");
	    exit();
	}else{
		
		$sql = "SELECT * FROM customer WHERE CustomerEmail='$email' AND CustomerPassword='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['CustomerEmail'] === $email && $row['CustomerPassword'] === $pass) {
            	$_SESSION['CustomerEmail'] = $row['CustomerEmail'];
            	$_SESSION['CustomerPassword'] = $row['CustomerPassword'];
            	$_SESSION['CustomerId'] = $row['CustomerId'];
            	header("Location: userhomepage.php");
		        exit();
            }else{
				header("Location: userlogin.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: userlogin.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: userhomepage.php");
	exit();
}