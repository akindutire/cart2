<?php require_once('include.php')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/cart.js"></script>
<script src="js/validateAndProcess.js"></script>
<script src="js/settings.js"></script>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>~Dashboard</title>
</head>

<body style="background-color:#D6D6D6;">
<div class="container-fluid">
<div class="row" style="background-color:#303030; color:#FFF;">
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
<div class="col-xs-4">
<form role="form"  class="form-horizontal" method="post"> 
<div class="form-group" style="padding:20px;">
<label for="role" style="margin-top:5px;">Product Category:</label> 
<select class="form-control"  style="margin-top:10px;" id="searchcategory" name="searchcategory" >
<option>--Select Category--</option>
<?php 
$category=array();
$viewCreatedForms->viewCategory();
$category = $viewCreatedForms->allCategory;

for($i=0; $i<count($category);$i++)
{
	echo '<option  value="'.$category[$i]['cat_id'].'">'.$category[$i]['cat_name'].'</option>';
}
?>
</select>  

</div>  </form>
</div>
<div class="col-xs-6">
<form role="form"  class="form-horizontal" method="post"> 
<div class="form-group" style="padding:20px;">
<label for="role" style="margin-top:10px;">Search for Products:</label> 
<input type="text" class="form-control"  placeholder="Search for Products or Categories of products" name="search" id="search"  style="padding:10px;"/>

</div>  </form>

</div>
<div class="col-xs-10" id="searchResult">
<div id="result" style="color:#2A9F00; text-align:center; font-size:14px;"></div>
<?php
$showproduct = array();
$viewCreatedForms->showProducts();
$showproduct = $viewCreatedForms->showProduct;
//print_r($showproduct);
$table = '<table class="table" width="100%"><tr><td>Product Description</td><td>Add Product</td></tr>';
			$sn = 1;
			for($i=0; $i< count($showproduct); $i++)
			{			 
			$table .= '<tr><td>'.$showproduct[$i]['product_name'].'</td><td><button type="submit" value='.$showproduct[$i]['product_id'].' class="button">
			<i><img src="image/add.png" /></i></button></td></tr>';
			}
			
			$table .= '<tr><td colspan="2"><label><a href="viewSales.php">Proceed &raquo; </a>
      </label></td></tr></table>';
			
			echo $table;
			?>
            
</div>

<div class="col-xs-10" id="searchCategory"></div>


</div>
</div>
</div>
</body>
</html>