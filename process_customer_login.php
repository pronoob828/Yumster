<?php
    session_start();
    require_once("inc/db.inc.php");

    $q = "select * from customers where c_email = '".$_POST["email"]."' and c_password = '".$_POST["password"]."'";

    $res = mysqli_query($db,$q) or die(mysqli_error($db));

    if(mysqli_num_rows($res) == 0){
        die("Wrong data. Try again");
    }

    $row = mysqli_fetch_assoc($res);
    $_SESSION["c_id"] = $row["c_id"];
    $_SESSION["c_name"] = $row["c_name"];

    header("Location: index.php");
    exit;
?>