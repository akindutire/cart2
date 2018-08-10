<?php
    require_once('include.php');
	$productCategory = $_POST['category'];
	if ($_POST['categoryId']=='')
	{$createForm->addCategory($id=false,$productCategory);}
	else {$createForm->addCategory($_POST['categoryId'],$productCategory);}
	echo $createForm->addCatMsg;