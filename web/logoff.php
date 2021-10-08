<?php
	session_start();
	if (!isset($_SESSION['uname']) && !isset($_SESSION['password']))
	{
		header('location:userlogin.php');
	}
	else
	{
		session_destroy();
		echo "<script> alert('Logoff Successful!')</script>";
		header('location:userlogin.php');
	}
?>