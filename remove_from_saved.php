<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/cust_required.inc.php');

$q_del_saved = "delete from savedcarts where c_id = ".$_SESSION['c_id']." and p_ids = '".$_GET['p'].",';";
mysqli_query($db, $q_del_saved) or die(mysqli_error($db));

header("location: ".$_SERVER['HTTP_REFERER']);
exit;
?>