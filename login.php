<?php require_once('inc/db.inc.php');
 session_start(); 
 if(isset($_SESSION['c_id']) or isset($_SESSION['b_id'])){
    header('Location: index.php');
    exit;
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <div class="container p-5">
        <div class="row row-cols-1 row-cols-md-4 justify-content-center">
            <div class="card col bg-warning border-warning g-0 mx-5" style="--bs-bg-opacity:.3;"">
                <img class="card-img-top" src="images/client.png" alt="ss">
                <div class="card-title text-center my-3">
                    <h1>Customer</h1>
                </div>
                <div class="card-body " >
                    <form action="process_customer_login.php" method="post">
                        <input class="form-control mb-3" name="email" type="email" placeholder="Email">
                        <input class="form-control my-3" name="password" type="password" placeholder="Password">
                        <div class="text-center">
                            <input class="btn btn-warning my-3" type="submit" value="Customer Login">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card col bg-warning border-warning g-0 mx-5" style="--bs-bg-opacity:.3;"">
                <img class="card-img-top" src="images/server2.jpg" alt="ss">
                <div class="card-title text-center my-3">
                    <h1>Business</h1>
                </div>
                <div class="card-body " >
                    <form action="process_business_login.php" method="post">
                        <input class="form-control mb-3" name="email" type="email" placeholder="Business Email">
                        <input class="form-control my-3" name="password" type="password" placeholder="Password">
                        <div class="text-center">
                            <input class="btn btn-warning my-3" type="submit" value="Business Login">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php require_once('inc/footer.inc.php') ?>
</body>

</html>