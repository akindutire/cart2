<?php //session_start();
require_once('include.php');
$cat_id = $_POST['keyword'];
//$cat_id=2;
$viewCreatedForms->productsInCategory($cat_id);
?>
