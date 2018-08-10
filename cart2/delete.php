<?php //session_start();
error_reporting(0);
require_once('cart.php');
?>
<?php
     $response = array();
      $key = $_POST['key'];
      $myCart = new Cart(); 
	  $response= $myCart->deleteProducts($_SESSION['addProducts'],$key);
	  $_SESSION['addProducts']=$response;
      echo json_encode($_SESSION['addProducts']);

?>