<?php require_once('inc/db.inc.php');
session_start();

$q = "select * from products where p_id = " . $_GET['p'] . ";";

$res = mysqli_query($db, $q) or die(mysqli_error($db));

if (mysqli_num_rows($res) == 0) {
    echo "No such product";
    header("Location: browse.php");
    exit;
}

if (isset($_SESSION['c_id'])) {
    $i_check_in_cart = "select * from carts where c_id = " . $_SESSION['c_id'] . " and p_id = " . $_GET['p'] . " ;";
    $ires = mysqli_query($db, $i_check_in_cart) or die(mysqli_error($db));

    $incart = (mysqli_num_rows($ires) != 0);
}

$row = mysqli_fetch_assoc($res);

$r = "select b_name from businesses where b_id = " . $row['b_id'] . ";";
$bres = mysqli_query($db, $r) or die(mysqli_error($db));

$brow = mysqli_fetch_assoc($bres);

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <div class="text-center justify-content-center row">
        <div class="container col-md-4 col-sm-10 p-3 bg-warning my-3 border rounded brown" style="--bs-bg-opacity:.3;">
            <div class="my-3">
                <img src="<?php echo $row['p_pic'] ?>" alt="..." class="img-fluid">
            </div>
            <div class="border rounded border-warning p-3">
                <h3>
                    <?php echo $row['p_name'] ?>
                </h3>
                <a class="brown brown_underline" href="business.php?b=<?php echo $row['b_id'] ?>">By
                    <?php echo $brow['b_name'] ?>
                </a>

                <p class="mt-3">
                    <?php echo $row['p_desc'] ?>
                </p>


                <p class="mt-3"><b>Nutrition Facts</b><br>
                    <?php echo $row['p_nutrition'] ?>
                </p>

                <div class="container mx-auto my-3">
                    <div class="bold">Price</div> <b>₹
                        <?php echo $row['p_price'] ?>
                    </b>
                </div>
                <div class="border-top pt-3 border-warning">
                    <?php if (isset($incart) and $incart) { ?>
                        <a href="remove_from_cart.php?p=<?php echo $row['p_id'] ?>" class="btn btn-danger m-2">Remove From
                            Cart</a>
                    <?php } elseif (isset($incart) and !$incart) { ?>
                        <a href="add_to_cart.php?p=<?php echo $row['p_id'] ?>" class="btn btn-success m-2">Add to Cart</a>
                    <?php } else { ?>
                        <a href="login.php" class="btn btn-success m-2">Add to Cart</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.inc.php') ?>

</body>