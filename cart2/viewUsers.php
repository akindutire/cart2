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

<div class="col-xs-10">
<fieldset>
<legend>View All Users </legend>
<?php
$viewUsers = array();
$viewCreatedForms->viewUsers();
$viewUsers = $viewCreatedForms->allUser;
//print_r($showproduct);
$table = '<table class="table" width="100%"><tr><td>S/N</td><td>Username</td><td>Role</td><td>Status</td></tr>';
			$sn = 1;
			for($i=0; $i< count($viewUsers); $i++)
			{			 
			$table .= '<tr><td>'.$sn.'</td><td>'.$viewUsers[$i]['username'].'</td><td>'.$viewUsers[$i]['role'].'</td>
			<td>'.$viewUsers[$i]['status'].'</td></tr>';
			}
			
			$table .= '</table>';
			
			echo $table;
			?>
            </fieldset>
            
</div>

</div>
</div>
</body>
</html>