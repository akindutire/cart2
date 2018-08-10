<?php
require_once('include.php');
//$keyword = $_POST['keyword'];
$cart->productPayment($_SESSION['addProducts']);
$soldDate= date('Y/m/d h:i:s');
$createForm->soldProducts($_SESSION['id'],$soldDate,$_SESSION['addProducts']);
unset($_SESSION['addProducts']);
/*//$soldDate= date('Y-m-d h:i:s');
$soldDte = '2014-07-01 03:08:16';
echo $soldDate;
$id =$_SESSION['id'];
$viewCreatedForms->viewSoldProduct($dateFrom=$soldDte,$dateTo=$soldDate,$userID=false);
print_r($viewCreatedForms->soldproduct);*/
?>
