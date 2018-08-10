<?php
    error_reporting(0);
    require_once('cart.php');
    require_once('class/formSubmit.php');
	require_once('class/viewFormSubmit.php');
	require_once('class/LoginDetails.php');
	
	$cart = new Cart();
	
	$createForm = new formSubmit();
	
	$userLoginORconnect = new loginDetails();
	
	$userLoginORconnect->dbConnect();
	
	$viewCreatedForms = new viewFormSubmit;   
?>