<?php
    require_once('include.php');
	$product   =   $_POST['product'];
	$quantity  =   $_POST['quantity'];
	$costprice =   $_POST['costprice'];
	$unitprice =   $_POST['unitprice'];
	
	$productArray = array('product'=>$_POST['product'],'quantity'=>$_POST['quantity'],'costprice' => $_POST['costprice'],'unitprice' => $_POST['unitprice']);
	if ($_POST['productId']=='')
	{
		$createForm->addProduct($id=false,$_POST['cat_id'],$productArray);
	}
	else {
		$createForm->addProduct($_POST['productId'],$catId=false,$productArray);
		}
	
	echo $createForm->addProductMsg;