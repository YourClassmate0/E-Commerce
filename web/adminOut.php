<?php 
session_start();
if(isset($_GET['logout'])){

session_destroy();
header("Location: adminlogin.php");

}
else{
	header("Location: adminlogin.php");
}
?>