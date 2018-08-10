<?php
    require_once('include.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$userLoginORconnect->userLogin($username,$password);