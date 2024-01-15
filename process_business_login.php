<?php
    session_start();
    require_once("inc/db.inc.php");

    $q = "select * from businesses where b_email = '".$_POST["email"]."' and b_password = '".$_POST["password"]."'";

    $res = mysqli_query($db,$q) or die(mysqli_error($db));

    if(mysqli_num_rows($res) == 0){
        die("Wrong data. Try again");
    }

    $row = mysqli_fetch_assoc($res);
    print_r($row);
    $_SESSION["b_id"] = $row["b_id"];
    $_SESSION["b_name"] = $row["b_name"];

    header("Location: index.php");
    exit;
?>