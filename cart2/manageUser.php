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
<div class="col-xs-4" style="border:1px solid #;background-color:#FFF; border-radius:5px; height:;">
<fieldset>
<legend>Manage User</legend>
<form role="form"  class="form-horizontal" method="post"> 
<div class="ajaxMsg" style="color:#A00; text-align:center;"></div>
<div class="form-group" style="padding:20px;"> 
<label for="role" style="margin-top:10px;">User's Username:</label> 
<select class="form-control"  style="margin-top:10px;" id="username" name="username" >
<option>--Select User--</option>
<?php
$viewUsers = array();
$viewCreatedForms->viewUsers();
$viewUsers = $viewCreatedForms->allUser;
//print_r($showproduct);
			for($i=0; $i< count($viewUsers); $i++)
			{			 
			echo '<option value="'.$viewUsers[$i]['id'].'">'.$viewUsers[$i]['username'].'</option>';
			
			}
			?>
</select> 
<label for="role" style="margin-top:10px;">Role:</label> 
<select class="form-control"  style="margin-top:10px;" id="role" name="role" >
<option>--Select role--</option>
<option>Sales</option>
<option>Admin</option>
</select> 
<label for="status" style="margin-top:10px;">Status:</label> 
<select class="form-control"  style="margin-top:10px;"  name="status" id="status">
<option>--Select status--</option>
<option>Active</option>
<option>Blocked</option>
</select>

<button type="submit" class="btn btn-primary" style="margin-top:10px;" id="manageUser"> <i><img src="image/edit.png" /></i> Save Changes</button>
</div>  </form></fieldset>
</div>
</div>

</div>
</div>
</body>
</html>