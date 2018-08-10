<?php //session_start();
require_once('cart.php');
?>

<?php
	  $key   = $_POST['key'] ;
	  $value = $_POST['value'];
      $myCart = new Cart(); 
	  $myCart->AddProducts($key,$value);
   

?>
