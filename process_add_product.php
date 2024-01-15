<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/business_required.inc.php');

$file_path = "";
$file_name = time() . rand(10000000, 99999999);
$file_name = "uploads/" . $file_name . "." . substr($_FILES['pic']['type'], 6, );
move_uploaded_file($_FILES['pic']['tmp_name'], $file_name);

$q = "insert into products (b_id, p_name, p_desc, p_price, p_pic, p_nutrition) values ( ".$_SESSION['b_id'].", '".$_POST['pname']."','".$_POST['desc']."',".$_POST['pprice'].",'".$file_name."','".$_POST['nutrition']."');";

mysqli_query($db, $q) or die(mysqli_error($db));

header("location: products.php");
exit;


?>