<?php require_once('include.php'); $cid = $_GET['catID']; $edit = array();
$viewCreatedForms->viewCategory($cid);
$edit = $viewCreatedForms->allCategory; //print_r($edit);?>
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
<span class="glyphicon glyphicon-user"></span> Hello <?php echo '<strong>'.ucwords($_SESSION['username']).'</strong>';?> <span class="glyphicon glyphicon-cog">
</span>
</div>
</div>
</div>

<div class="row">
<div class="col-xs-2" style="background-color:#1B1B1B;height:620px;">
   <?php include('sidebar.php');?>
</div>

<div class="col-xs-10" style="background-color:#;padding:20px;">
<div class="col-xs-4" style="border:1px solid #;background-color:#FFF; border-radius:5px; height:250px;">
<fieldset>
<legend>Create Category</legend>
<form role="form"  class="form-horizontal" method="post"> 
<input type="hidden" value="<?php echo $cid;?>" id="categoryId" />
<div class="ajaxMsg" style="color:#A00; text-align:center;"></div>
<div class="form-group" style="padding:20px;"> 
<label for="username" style="margin-top:10px;">Category Name:</label> 
<input type="text" class="form-control"  placeholder="Enter Category" name="category" id="category"  style="padding:10px;" value="<?php if ($cid==true)
{echo $edit[0]['cat_name'];}?>"/> 

<button type="submit" class="btn btn-primary" style="margin-top:10px;" id="createCategory"><?php if($cid==true)  echo  'Update Category <i><img src="image/edit.png" /></i>'; else echo 'Create Category'; ?></button>
</div>  </form></fieldset>
</div>
</div>

</div>
</div>
</body>
</html>