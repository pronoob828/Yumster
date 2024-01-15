<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/cust_required.inc.php');


require_once('inc/clear_cart.inc.php');

foreach( explode(',',$_GET['p']) as $pid){
    $i = "insert into carts (c_id,p_id) values (".$_SESSION['c_id'].",".$pid.");";
    mysqli_query($db, $i) or die(mysqli_error($db));
}

/* $q_del_saved = "delete from savedcarts where c_id = ".$_SESSION['c_id']." and p_ids = '".$_GET['p'].",';";
mysqli_query($db, $q_del_saved) or die(mysqli_error($db)); */

header("location: cart.php");
exit;


?>