<?php //session_start();
require_once('include.php');
$keyword = $_POST['keyword'];
$viewCreatedForms->searchProducts($keyword);
?>
