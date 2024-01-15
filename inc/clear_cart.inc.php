<?php 

$del_query = "delete from carts where c_id = " . $_SESSION['c_id'] . ";";
mysqli_query($db, $del_query) or die(mysqli_error($db));

?>