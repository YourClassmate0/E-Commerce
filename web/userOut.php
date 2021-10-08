<?php 
session_start();
if(isset($_GET['logout'])){

session_destroy();
header("Location: userlogin.php");

}
else{
	header("Location: userlogin.php");
}
?>