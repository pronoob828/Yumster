<?php
session_start();
require_once("inc/db.inc.php");

if($_POST['password'] != $_POST['confirmpassword']){
    die('Error. Passwords do not match.');
}

print_r($_POST);

$q = "insert into customers (c_name, c_email, c_phone, c_password) values ('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."');";

mysqli_query($db,$q) or die(mysqli_error($db));

header("location: login.php");
exit;
?>