<?php require_once('inc/db.inc.php');
session_start();

if (isset($_GET['b'])) {
    $id = $_GET['b'];
} elseif (isset($_SESSION['b_id'])) {
    $id = $_SESSION['b_id'];
} else {
    die("Invalid URL");
}

$q = "select * from businesses where b_id = '" . $id . "';";

$res = mysqli_query($db, $q) or die(mysqli_error($db));

if (mysqli_num_rows($res) == 0) {
    die("Wrong data. Try again");
}

$p = "select * from products where b_id = '" . $id . "';";
$pres = mysqli_query($db, $p) or die(mysqli_error($db));

$empty = false;
if (mysqli_num_rows($pres) == 0) {
    $empty = true;
}

$row = mysqli_fetch_assoc($res);
$pics = explode(';', $row['pics']);
unset($pics[count($pics) - 1]);
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>
    <div class="container border my-5 bg-warning brown text-center justify-content-center" style="--bs-bg-opacity:.3">
        <h1>
            <?php echo $row['b_name'] ?>
        </h1>
        <div class="container mx-auto w-75">

            <div id="carousel" style="z-index:0" class="carousel slide carousel-fade my-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($pics as $i => $pic) { ?>
                        <div class="carousel-item <?php if ($i == 0) {
                            echo ' active';
                        } ?>">
                            <img src="<?php echo $pic ?>" class="img-fluid" alt="...">
                        </div>
                    <?php } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>




        </div>
        <div class="row justify-content-center">
            <div class="table-responsive col-md-9">
                <table class="table table-borderless table-warning align-middle">
                    <tr>
                        <td>Email</td>
                        <td>
                            <?php echo $row['b_email'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>
                            <?php echo $row['b_phone'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <?php echo $row['b_street'] . ", " . $row['b_city'] . ", " . $row['b_state'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h3>About us</h3>
                            <p>
                                <?php echo $row['b_desc'] ?>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <h2>Products from
            <?php echo $row['b_name'] ?>
        </h2>
        <?php if (!$empty) { ?>

            <div class="card-group row row-cols-1 row-cols-md-2 row-cols-lg-4 mb-5 mx-1">
                <?php while ($row = mysqli_fetch_assoc($pres)) {
                    if (isset($_SESSION['b_id']) and $_SESSION['b_id'] == $row['b_id']) {
                        $plink = 'update_product.php?p=' . $row['p_id'];
                    } else {
                        $plink = 'view_product.php?p=' . $row['p_id'];
                    }
                    ?>
                    <div class="col">
                        <div class="card h-100 text-center bg-warning" style="--bs-bg-opacity:.3;">
                            <a href="<?php echo $plink ?>" class="brown">
                                <img src="<?php echo $row['p_pic'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $row['p_name'] ?>
                                    </h5>
                                    <p class="card-text">
                                        <?php echo substr($row['p_desc'], 0, 50) . '...' ?>
                                    </p>
                                    <h2>₹
                                        <?php echo $row['p_price'] ?>
                                    </h2>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>

        <?php } else { ?>
            <h3 class="brown text-center my-5"> No Products.</h3>
        <?php } ?>


    </div>

    <?php require_once('inc/footer.inc.php') ?>

</body>

</html>