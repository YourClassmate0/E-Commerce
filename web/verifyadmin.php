<?php
	Session_start();
	if($_REQUEST['uname']=='admin' && $_REQUEST['password']=='password')
	{
		$_SESSION['loginName']='admin';
		$_SESSION['passWord']='password';
		echo "<script>alert('Login Successful!');</script>";
		echo "<script>window.location.href='adminpage.html'</script>";
		}
	else
	{
		echo "<script>alert('Unauthorized Login!');</script>";
		echo "<script>window.location.href='adminlogin.php'</script>";		
	}
?>