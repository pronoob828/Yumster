<?php require_once('inc/db.inc.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <div class="container">
        <div class="row row-cols-2 row-cols-md-3 justify-content-center">
            <div class="card col g-0 mx-5 bg-warning my-2" style="--bs-bg-opacity:.3" >
                <a class="brown" href="register_customer.php">
                    <img src="images/client.png" class="card-img-top" alt="...">
                    <div class="card-title text-center">
                        <h3>Register as Customer</h3>
                </a>
            </div>
        </div>
        <div class="card col g-0 mx-5 bg-warning my-2" style="--bs-bg-opacity:.3" >
            <a class="brown" href="register_business.php">
                <img src="images/server2.jpg" class="card-img-top" alt="...">
                <div class="card-title text-center">
                    <h3>Register as a Business</h3>
                </div>
            </a>
        </div>
    </div>
    </div>
    <?php require_once('inc/footer.inc.php') ?>
</body>

</html>