<?php
	Session_start();
	if($_REQUEST['uname']=='username' && $_REQUEST['password']=='password')
	{
		$_SESSION['loginName']='username';
		$_SESSION['passWord']='password';
		echo "<script>alert('Login Successful!');</script>";
		echo "<script>window.location.href='userhomepage.html'</script>";
		}
	else
	{
		echo "<script>alert('Unauthorized Login!');</script>";
		echo "<script>window.location.href='userlogin.php'</script>";		
	}
?>