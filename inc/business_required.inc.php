<?php
if (!isset($_SESSION["b_id"])) {
    header("location: login.php");
    exit;
}
?>