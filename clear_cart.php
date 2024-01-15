<?php 
require_once('inc/db.inc.php');
session_start();
require_once('inc/cust_required.inc.php');

$del_query = "delete from carts where c_id = " . $_SESSION['c_id'] . ";";
mysqli_query($db, $del_query) or die(mysqli_error($db));

header("Location:".$_SERVER['HTTP_REFERER']);
exit;

?>