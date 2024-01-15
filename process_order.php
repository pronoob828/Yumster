
<?php 
    echo "<h3>You weren't supposed to do that</h3>";
    header('Refresh: 2; URL='.$_SERVER['HTTP_REFERER']);
?>