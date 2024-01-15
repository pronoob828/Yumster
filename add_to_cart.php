<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/cust_required.inc.php');

$q = "select * from carts where c_id = ".$_SESSION['c_id']." and p_id = ".$_GET['p'].";" ;
$res = mysqli_query($db, $q) or die(mysqli_error($db));
if(mysqli_num_rows($res) != 0){
    header("location: browse.php");
    exit;
}

$i = "insert into carts (c_id,p_id) values (".$_SESSION['c_id'].",".$_GET['p'].");";

mysqli_query($db, $i) or die(mysqli_error($db));

header("Location:".$_SERVER['HTTP_REFERER'] );
exit;


?>