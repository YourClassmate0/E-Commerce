<?php
	session_start();
	if (!isset($_SESSION['uname']) && !isset($_SESSION['password']))
	{
		header('location:adminlogin.php');
	}
	else
	{
		session_destroy();
		echo "<script> alert('Logoff Successful!')</script>";
		header('location:adminlogin.php');
	}
?>