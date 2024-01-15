<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/cust_required.inc.php');

$q = "select * from carts where c_id = " . $_SESSION['c_id'] .";";
$res = mysqli_query($db, $q) or die(mysqli_error($db));
if (mysqli_num_rows($res) == 0) {
    header("location: browse.php");
    exit;
}

$pids = '';
while($row = mysqli_fetch_assoc($res)) {
    $pids = $pids . $row['p_id'].',';
}

$i = "insert into savedcarts (c_id,p_ids) values (" . $_SESSION['c_id'] . ",'" .$pids . "');";

mysqli_query($db, $i) or die(mysqli_error($db));
require_once('inc/clear_cart.inc.php');

header("location: saved_carts.php");
exit;


?>