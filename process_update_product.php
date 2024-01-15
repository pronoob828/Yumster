<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/business_required.inc.php');

$q = "update products set
    p_name = '".$_POST['pname']."',
    p_desc = '".$_POST['desc']."',
    p_nutrition = '".$_POST['nutrition']."',
    p_price = ".$_POST['price']."
where p_id = ".$_POST['pid']."
";

mysqli_query($db, $q) or die(mysqli_error($db));

header("location: products.php");
exit;


?>