<?php
    require_once('include.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	$status = $_POST['status'];
	
	
	$userArray = array('username'=>$_POST['username'],'password'=>$_POST['password'],'role' => $_POST['role'],'status' => $_POST['status']);
	$createForm->addUsers($id=false,$userArray);
	echo $createForm->addUsersMsg;