<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/business_required.inc.php');

print_r($_POST);

$file_path = "";
$file_name = time() . rand(10000000, 99999999);
$file_name = "uploads/" . $file_name . "." . substr($_FILES['pic']['type'], 6, );
move_uploaded_file($_FILES['pic']['tmp_name'], $file_name);


$q = "update products set
    p_pic = '".$file_name."'
where p_id = ".$_POST['pid']."
";

mysqli_query($db, $q) or die(mysqli_error($db));

header("location: products.php");
exit;


?>