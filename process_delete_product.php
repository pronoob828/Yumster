<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/business_required.inc.php');

$q = "select * from products where p_id = ".$_POST['pid']." and b_id = ".$_SESSION['b_id'].";";

$res = mysqli_query($db,$q) or die(mysqli_error($db));

if(mysqli_num_rows($res) == 0){
    die("Forbidden");
}

$q = "delete from products where p_id = ".$_POST['pid'].";";

mysqli_query($db, $q) or die(mysqli_error($db));

header("location: products.php");
exit;


?>