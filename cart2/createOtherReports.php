<?php require_once('include.php'); $dailyReport= array(); //print_r($_POST);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<script src="js/jquery-1.9.1.js"></script>--><script  src="js/jquery.js"></script>
<script src="js/cart.js"></script>
<script src="js/settings.js"></script>
<script src="js/validateAndProcess.js"></script>
<link href="css/style.css" rel="stylesheet" />
<link href="css/jquery.datetimepicker.css"  rel="stylesheet"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>~ Dashboard # Lytopz Pharmacy</title>
<style>
body{
	font-family:Tahoma, Geneva, sans-serif;
}

</style>
<!--<script src="bootstrap/js/bootstrap.js"></script>-->
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
<div class="col-xs-4" style="border:1px solid #;background-color:#FFF; border-radius:5px;">
<fieldset>
<legend> Reports Based on Date/Time</legend>
<form role="form"  class="form-horizontal" method="post" action=""> 
<div class="ajaxMsg" style="color:#A00; text-align:center;"></div>
<div class="form-group" style="padding:20px;"> 
<label for="username" style="margin-top:10px;">From Date:</label> 
<input type="text" class="form-control"  placeholder="Enter From Date" name="fromdate" id="fromdate"  style="padding:10px;"/> 
<label for="text" style="margin-top:10px;">To Date:</label> 
<input type="text" class="form-control" placeholder=" Enter To Date" name="todate" id="todate" style="padding:10px;" /> 

<label for="role" style="margin-top:10px;">Product Name:</label> 
<select class="form-control"  style="margin-top:10px;" id="productname" name="productname" >
<option></option>
<?php
$product=array();
$viewCreatedForms->viewProduct($noId);
$product = $viewCreatedForms->allProduct;

for($i=0; $i<count($product);$i++)
{
	echo '<option  value="'.$product[$i]['product_id'].'">'.$product[$i]['product_name'].'</option>';
}
?>
</select>
<button type="submit" class="btn btn-primary" style="margin-top:10px;" id="createReports" name="createReports">Generate Reports</button>
</div>  </form></fieldset>
</div>
<div class="col-xs-10" style="border:1px solid #;background-color:#FFF; border-radius:5px; margin-top:20px;">
<?php
if (isset($_POST['createReports']))
{
echo '<h3 align="center">Sales Report Generated as at '.date('Y-m-d').'</h3><hr>';
$dateFrom = $_POST['fromdate'];
$dateTo = $_POST['todate'];
$productID = $_POST['productname'];
 $viewCreatedForms->viewSoldProduct($datefrom=$dateFrom,$dateto=$dateTo,$userID=$_POST['salesrep'],$productID);
 $dailyReport = $viewCreatedForms->soldproduct;
 $viewCreatedForms->sumQuantity($productID);
//print_r($viewCreatedForms->productSum);
//print_r($dailyReport);
$qsold = 0;
$qleft = 0;
$amountSold = 0;
$amountLeft=0;
$profitForToday = 0;
  $table = '<table class="table"><tr><td>S/N</td><td>Product Name</td><td>Quantity Sold</td><td>Cost Price</td><td>Unit Price</td><td>Amount (N)</td><td>Date Sold</td></tr>';
  $sn=1;
  for($i=0;$i<count($dailyReport);$i++)
  {
	  $table.='<tr><td>'.$sn.'</td><td>'.$dailyReport[$i]['product_name'].'</td><td>'.$dailyReport[$i]['sold_quantity'].'</td>
	 <td>'.(float)$dailyReport[$i]['cost_price'].'</td> <td>'.(float)$dailyReport[$i]['unit_price'].'</td><td>'. (float) $dailyReport[$i]['sold_quantity']*$dailyReport[$i]['unit_price'].'</td><td>'.$dailyReport[$i]['sold_date'].'</td></tr>';
	  /////////////////////summation of products////////////////////
	  $qleft+=$dailyReport[$i]['quantity'];
	  $qsold+=$dailyReport[$i]['sold_quantity'];
	  $amountSold+=(float) $dailyReport[$i]['sold_quantity']*$dailyReport[$i]['unit_price'];
	  $amountLeft+=(float) $dailyReport[$i]['sold_quantity']*$dailyReport[$i]['cost_price'];
	  
	  /////////////////////end of summation of products////////////////
	  $sn++;
  }
  //////////////////////// calculating quantity left/////////////////
  
  $proSum = array();
  $proSum= $viewCreatedForms->productSum;
  if (!empty($dailyReport))
  {
  for ($i=0;$i<count($proSum);$i++)
  {
	 //$amountLeft+= $proSum[$i]['quantity']*$proSum[$i]['cost_price'];
	 $quantityLeft+=$proSum[$i]['quantity'];
  }   }

  ///////////////////////////////////////////////////////////////////
  
  if ($amountSold>=$amountLeft)
  $profitForToday= floatval($amountSold-$amountLeft);
  else 
  $profitForToday= floatval($amountLeft-$amountSold);
  $table.='<tr><td colspan="3" align="center">Total Quantity Sold = '.$qsold.'</td><td align="left"><strong> Total Quantity Left = '.$quantityLeft.'</strong></td><td colspan="2" align="left"><strong>Total Sold(N) =  '.$amountSold.'</strong></td>
  <td  align="left"><strong>Total Cost(N) = N'.$amountLeft.'</strong></td></tr>';
  
  $table.='<tr><td colspan="7" align="center"> <h2>Sales Summary </h2> <hr> 
                                               
   Profit Made for Today ( '.$dailyReport[0]['sold_date'].' ) =  Total Cost Price(N) =  '.$amountLeft.' - Total Sold(N) =  N'.$amountSold.' = N'.$profitForToday.'</td></tr>';
   $table.='</table>';
  $table.='</table>';
  echo $table;
}
?>

</div>

</div>

</div>
</div>
</body>
</html>

<script src="js/jquery.datetimepicker.js"></script>
<script>
$('#fromdate').datetimepicker({
	formatDate:'Y-m-d',format:'Y-m-d'});
	$('#todate').datetimepicker({
	formatDate:'Y-m-d',format:'Y-m-d'});
</script>