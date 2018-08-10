<?php require_once('include.php')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
#payment
{
	background-color:#2A9F00;
	border-radius:5px;
	width:auto;
}
@media print {
	.settings,#header,#back,.col-xs-10 col-xs-4{
		display:none;
	}
	#searchResult
	{
		float:left;
	}
	table {
		border:none !important;
	}
	table tr {
		border-top:1px dashed #000;
	}
	table tr td {
		text-align:center;
	}
}
</style>
<script src="bootstrap/js/bootstrap.js"></script>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>~Dashboard</title>
</head>

<body style="background-color:#D6D6D6;">
<div class="container-fluid">
<div class="row" style="background-color:#303030; color:#FFF;" id="header">
<div class="col-xs-4">
<div style="float:left; text-align:left;font:Tahoma, Geneva, sans-serif; font-size:14px;">
<span class="glyphicon glyphicon-cloud"></span> Lytopz Pharmacy Plc</div>
</div>
<div class="col-xs-8">
<div style="float:right; text-align:left;font:Tahoma, Geneva, sans-serif; font-size:14px;">
<span class="glyphicon glyphicon-user"></span> Hello <?php echo '<strong>'.ucwords($_SESSION['username']).'</strong>';;?> 
</div>
</div>
</div>

<div class="row">
<div class="col-xs-2" style="background-color:#1B1B1B;height:620px;">
   <?php include('sidebar.php');?>
</div>

<div class="col-xs-10" style="background-color:#FFF;padding:20px;">
<div id="back"><label><a href="Sales.php">Back &laquo; </a></label></div>
<div id="viewProducts">
<?php
//echo $_SESSION['id'];
      $myCart = new Cart(); 
	  $myCart->ViewProductz($_SESSION['addProducts']);
	  //print_r($_SESSION['addProducts']);
   

?>
</div>
</div>

</div>
</div>
</body>
</html>