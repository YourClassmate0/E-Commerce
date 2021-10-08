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
		header("Location: adminlogin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: adminlogin.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admin WHERE AdminEmail='$email' AND AdminPassword='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['AdminEmail'] === $email && $row['AdminPassword'] === $pass) {
            	$_SESSION['AdminEmail'] = $row['AdminEmail'];
            	$_SESSION['AdminPassword'] = $row['AdminPassword'];
            	$_SESSION['AdminId'] = $row['AdminId'];
            	header("Location: adminpage.php");
		        exit();
            }else{
				header("Location: adminlogin.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: adminlogin.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: adminpage.php");
	exit();
}