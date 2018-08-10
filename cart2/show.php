<?php //session_start();
require_once('cart.php');
?>
<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/cart.js"></script>

<script>
$(document).ready(function() {
$('#set1').hide();
$('#user').hide();

$('#settings').hover(function()
   {   
   $('#set1').show('slow');
	},function(){
	$('#set1').toggle('slow');
	});
	
	
$('#uManagement').hover(function()
   {   
   $('#user').show('slow');
	},function(){
	$('#user').toggle('slow');
	});
	
});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body{
	font-family:Tahoma, Geneva, sans-serif;
}
button {
	background:#D40000;
	border:0 #000;
	width:100px;
	color:#fff;
}

.settings {
	list-style:none;
	width:200px;
	float:left;
}
.settings > li {
	background-color:#B0B0B0;
	border-bottom:1px solid #000;
	width:300px;
	float:left;
}
#set1,#user {
	list-style:url(image/item.png);
	z-index:1000px;
}
#set1 li a {
	text-decoration:none;
	color:#fff;
	width:200px;
}
#set1 li a:hover {
	text-decoration:inherit;
	color:#7F0000;
}
#user li a {
	text-decoration:none;
	color:#fff;
	
}
#user li a:hover {
	text-decoration:inherit;
	color:#7F0000;
}
</style>
</head>

<body>
<div id="result">
</div>
<form name="form1" method="post" action="">
         <button type="submit"  value="1" class="button">Add to Cart</button>
         <button type="submit" value="2" class="button">Add to Cart</button>
         <button type="submit" value="3" class="button">Add to Cart</button>
         <label><a href="view.php">Proceed >> </a>
      </label></td>
    </tr>
  </table>
 <ul class="settings">
  <li id="uManagement"><!-- user starts-->
  <i><img src="image/usradd.png"/></i> User Management
  <ul id="user">
  <li><a href="#">Manage User</a></li>
  <li><a href="#">Create User</a></li>
  <li><a href="#">View Users</a></li>
  </ul>
  </li><!-- user starts-->
   <li id="settings"><!-- setting starts-->
  <i><img src="image/generic.png"/></i> Product Management
  <ul id="set1">
  <li><a href="#">Create Products</a></li>
  <li><a href="#">Manage Products</a></li>
  </ul>
  </li><!-- setting starts-->
  </ul>
</form>
</body>
</html>