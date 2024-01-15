<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/cust_required.inc.php');

$q = "delete from carts where p_id = ".$_GET['p']." and c_id = ".$_SESSION['c_id'].";";

mysqli_query($db, $q) or die(mysqli_error($db));

header("Location:".$_SERVER['HTTP_REFERER']);
exit;


?>