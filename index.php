<?php require_once('inc/db.inc.php');
session_start();
$logged_in = (isset($_SESSION['b_id']) or isset($_SESSION['c_id']));

if(isset($_SESSION['b_id'])){
    header('location: business.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <main id="main">
        <div class="container-fluid">
            <div id="carousel" style="z-index:0" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/burgeer.jpeg" class=" d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block d-inline bg-warning brown" style="--bs-bg-opacity: .6">
                            <h5>Fast and Yummy</h5>
                            <a href="<?php if(!$logged_in){echo 'register.php';} else{ echo 'browse.php';}?>" class="btn btn-warning opacity-100"><?php if(!$logged_in){ echo 'Register';} else {echo 'Browse' ;}?></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/non-veg.jpg" class=" d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block d-inline bg-warning brown" style="--bs-bg-opacity: .6">
                            <h5>Authentic Cuisine</h5>
                            <a href="<?php if(!$logged_in){echo 'register.php';} else{ echo 'browse.php';}?>" class="btn btn-warning opacity-100"><?php if(!$logged_in){ echo 'Register';} else {echo 'Browse' ;}?></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/salad.jpg" class=" d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block d-inline bg-warning brown" style="--bs-bg-opacity: .6">
                            <h5>Healthy and diet-friendly</h5>
                            <a href="<?php if(!$logged_in){echo 'register.php';} else{ echo 'browse.php';}?>" class="btn btn-warning opacity-100"><?php if(!$logged_in){ echo 'Register';} else {echo 'Browse' ;}?></a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </main><!-- End #main -->

    <?php require_once('inc/footer.inc.php') ?>

</body>

</html>