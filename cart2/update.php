<?php require_once('include.php');?>
<?php
$proQty = array();
	  $key   = $_POST['key'] ;
	  $value = $_POST['value'];
	  ///////testing for quantity not greater than ones in the product table/////////
	  $viewCreatedForms->viewProduct($key);
	  $proQty= $viewCreatedForms->allProduct;
	 //print_r($proQty);
	  
	 if  ($value > $proQty[0]['quantity'])
	 {
		 echo $proQty[0]['quantity'];
	 }elseif($value==0)
	 {
		 echo 'Transaction error: 0 is not a quantity';
	 }
	 else {
		 echo 'true';
	  $myCart = new Cart(); 
	  $myCart->AddProduct($key,$value);
	 }
	  ///////////////////////////////////////////////////////////////////

   

?>
