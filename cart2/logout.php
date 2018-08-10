<?php
require_once('include.php');
unset($_SESSION['addProducts']);
session_destroy();
echo '<meta http-equiv="refresh" content="0; url=index.php">';
?>
