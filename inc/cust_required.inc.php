<?php 
    if(!isset($_SESSION['c_id'])){
        header('location: login.php');
        exit;
    }
?>