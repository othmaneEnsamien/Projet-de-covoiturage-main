<?php 
session_start();
//$_SESSION['create_account_logged_in']=$eid; 
unset($_SESSION['create_account_logged_in']);	
header('location:index.php'); 
?> 