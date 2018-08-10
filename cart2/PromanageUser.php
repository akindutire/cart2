<?php
    require_once('include.php');
	$username = $_POST['username'];
	$role = $_POST['role'];
	$status = $_POST['status'];
	
	$userArray = array('role' => $_POST['role'],'status' => $_POST['status']);
	$createForm->addUsers($_POST['username'],$userArray);
	echo $createForm->addUsersMsg;