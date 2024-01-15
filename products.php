<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/business_required.inc.php');
$empty = false;
$q = "select * from products where b_id = " . $_SESSION['b_id'] . ";";

$res = mysqli_query($db, $q) or die(mysqli_error($db));

if (mysqli_num_rows($res) == 0) {
    $empty = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <h3 class="brown text-center">Your Products</h3>
    <div class="container-fluid my-3 d-flex flex-wrap justify-content-end">
        <a href="add_product.php" class="btn btn-success">Add Product</a>
    </div>

    <?php if (!$empty) { ?>

        <div class="card-group row row-cols-1 row-cols-md-2 row-cols-lg-4 mb-5 mx-1">
            <?php while ($row = mysqli_fetch_assoc($res)) {
                if (isset($_SESSION['b_id'])) {
                    $plink = 'update_product.php?p=' . $row['p_id'];
                }
                ?>
                <div class="col">
                    <div class="card h-100 text-center bg-warning" style="--bs-bg-opacity:.3;" >
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
        <h3 class="brown text-center my-5"> You have no products.</h3>
    <?php } ?>


    <?php require_once('inc/footer.inc.php') ?>

</body>

</html>