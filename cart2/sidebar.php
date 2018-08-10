<script>
$(document).ready(function() {
    <?php if ($_SESSION['role']=='Admin') { ?>
	$('#settings').hide();
	$('#statistics').hide();
	<?php } else {?>
	$('#uManagement').hide();
	$('#products').hide();
	$('#reports').hide();
	$('#settings').hide();
	$('#statistics').hide();
	<?php } ?>
});
</script>
<ul class="settings">
 <li><a href="dashboard.php" style="text-decoration:none; font-size:14px; color:#fff;"><i><img src="image/home.png"/></i> Home</a> </li>
  <li id="uManagement"><!-- user starts-->
  <i><img src="image/user.png"/></i> User Management
  <ul id="user">
  <li><a href="manageUser.php">Manage User</a></li>
  <li><a href="createUser.php">Create User</a></li>
  <li><a href="viewUsers.php">View Users</a></li>
  </ul>
  </li><!-- user starts-->
   <li id="products"><!-- setting starts-->
  <i><img src="image/product.png"/></i> Product Management
  <ul id="product">
  <li><a href="createProduct.php">Create Products</a></li>
  <li><a href="viewProduct.php">Manage Products</a></li>
  <li><a href="createCategory.php">Create Category</a></li>
  <li><a href="viewCategory.php">Manage Category</a></li>
  </ul>
  </li><!-- setting starts-->
  <li id="sales"><!-- setting starts-->
  <i><img src="image/sales.png"/></i> Sales Management
  <ul id="sale">
  <li><a href="sales.php">Begin Transaction</a></li>
  </ul>
  </li><!-- setting starts-->
   <li id="reports"><!-- setting starts-->
  <i><img src="image/report.png"/></i> Report Management
  <ul id="report">
  <li><a href="createOtherReports.php">Generate Reports</a></li>
  <li><a href="createSalesRepReports.php">Report on Sales Rep</a></li>
  </ul>
  </li><!-- setting starts-->
  <li id="statistics"><!-- setting starts-->
  <i><img src="image/chart.png"/></i> Statistics Management
  <ul id="statistic">
  <li><a href="#">View Statistical Report</a></li>
  </ul>
  </li><!-- setting starts-->
  
  <li id="settings"><!-- setting starts-->
  <i><img src="image/settings.png"/></i> Settings
  <ul id="set1">
  <li><a href="#">Customize Application</a></li>
  </ul>
  </li><!-- setting starts-->
  <li id="changes"><!-- setting starts-->
  <i><img src="image/close.png"/></i> Close Application
  <ul id="change">
  <li><a href="logout.php">Log Out</a></li>
  </ul>
  </li><!-- setting starts-->
  </ul>