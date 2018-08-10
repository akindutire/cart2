<?php //session_start();
error_reporting(0);
require_once('cart.php');
require_once('include.php');
?>
<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/cart.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Products</title>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/cart.js"></script>
<script src="js/settings.js"></script>
<script src="js/validateAndProcess.js"></script>
<link href="css/style.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>~ Dashboard # Lytopz Pharmacy</title>
<style>
body{
	font-family:Tahoma, Geneva, sans-serif;
}

</style>
<script src="bootstrap/js/bootstrap.js"></script>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet"/>
</head>

<body>
<div id="viewProducts">
<?php
      $myCart = new Cart(); 
	  $myCart->ViewProductz($_SESSION['addProducts']);
	  //print_r($_SESSION['addProducts']);
   

?>
</div>
</body>
</html>