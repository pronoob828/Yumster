<?php
session_start();
require_once("inc/db.inc.php");

$file_paths = "";

if($_POST['password'] != $_POST['confirmpassword']){
    echo 'Error. Passwords do not match.';
    header("location: register_business.php");
    exit;
}

foreach ($_FILES['pics']['tmp_name'] as $i => $fname) {
    if (substr($_FILES['pics']['type'][$i], 0,5 ) != 'image') {
        echo 'INVALID FILE <br>';
        echo $fname;
        exit;
    }
    $file_name = time() . rand(10000000,99999999);
    $file_name = "uploads/".$file_name.".".substr($_FILES['pics']['type'][$i], 6, );
    move_uploaded_file($fname,$file_name);
    $file_paths = $file_paths.$file_name.';';
}

$q = "insert into businesses (o_name, o_email, o_phone, b_name, b_email, b_phone, b_state, b_city, b_street, b_desc, b_password, pics) values ('".$_POST['oname']."','".$_POST['oemail']."','".$_POST['ophone']."','".$_POST['bname']."','".$_POST['bemail']."','".$_POST['bphone']."','".$_POST['state']."','".$_POST['city']."','".$_POST['address']."','".$_POST['desc']."','".$_POST['password']."','".$file_paths."')";

mysqli_query($db,$q) or die(mysqli_error($db));

header("location: login.php");
exit;
?>