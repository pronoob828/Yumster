<?php require_once('inc/db.inc.php');
session_start();

if (isset($_SESSION['b_id'])) {
    header('location: index.php');
    exit;
}

$empty = false;
$q = "select * from products";
$res = mysqli_query($db, $q) or die(mysqli_error($db));

if (mysqli_num_rows($res) == 0) {
    $empty = true;
}

$qb = "select * from businesses where b_id in (select b_id from products);";
$abres = mysqli_query($db, $qb) or die(mysqli_error($db));

$incart = false;
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <h3 class="brown text-center my-5">Browse products</h3>

    <?php if (!$empty) { ?>
        <div class="container text-center mb-1">
            <p class="d-inline-flex gap-1">
                <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#filterbtn">
                    Filter <i class="fa-solid fa-caret-down"></i>
                </button>
            </p>
            <div class="collapse" id="filterbtn">
                <div class="card card-body bg-warning" style="--bs-bg-opacity:.3">
                    <div class="row row-cols-4 row-cols-lg-6">
                        <?php while ($abrow = mysqli_fetch_assoc($abres)) { ?>
                            <div class="col my-2">
                                <a role="button" class="brown brown_underline" onclick="onPageSearch(<?php echo $abrow['b_id']?>)" ><?php echo $abrow['b_name']?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="main_products_div" class="card-group row row-cols-2 row-cols-md-2 row-cols-lg-4 mb-5 mx-1">
            <?php while ($row = mysqli_fetch_assoc($res)) {

                $bq = "select * from businesses where b_id = (" . $row['b_id'] . ");";
                $bres = mysqli_query($db, $bq) or die(mysqli_error($db));
                $brow = mysqli_fetch_assoc($bres);

                if (isset($_SESSION['c_id'])) {

                    $i_check_in_cart = "select * from carts where c_id = " . $_SESSION['c_id'] . " and p_id = " . $row['p_id'] . " ;";
                    $ires = mysqli_query($db, $i_check_in_cart) or die(mysqli_error($db));

                    if (mysqli_num_rows($ires) == 0) {
                        $incart = false;
                    } else {
                        $incart = true;
                    }
                }
                ?>
                <div class="col mt-1 product b_<?php echo $row['b_id'] ?> " id="<?php echo $row['p_id'] ?>">
                    <div class="card h-100 text-center bg-warning" style="--bs-bg-opacity:.3;">
                        <a href="<?php echo 'view_product.php?p=' . $row['p_id'] ?>" class="brown">
                            <img src="<?php echo $row['p_pic'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $row['p_name'] ?>
                                </h5>
                                <div>
                                    <a class="brown brown_underline" href="business.php?b=<?php echo $brow['b_id'] ?>"><small>By
                                            <?php echo $brow['b_name'] ?>
                                        </small></a>
                                </div>
                                <p class="card-text">
                                    <?php echo substr($row['p_desc'], 0, 50) . '...' ?>
                                </p>
                                <h2>₹
                                    <?php echo $row['p_price'] ?>
                                </h2>
                            </div>
                        </a>
                        <div class="card-footer">
                            <?php if (isset($_SESSION['c_id']) and $incart) { ?>
                                <a href="remove_from_cart.php?p=<?php echo $row['p_id'] ?>" class="btn btn-danger m-2">Remove From
                                    Cart</a>
                            <?php } elseif (isset($_SESSION['c_id']) and !$incart) { ?>
                                <a href="add_to_cart.php?p=<?php echo $row['p_id'] ?>" class="btn btn-success m-2">Add to Cart</a>
                            <?php } else { ?>
                                <a href="login.php" class="btn btn-success m-2">Add to Cart</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

    <?php } else { ?>
        <h3 class="brown text-center my-5"> You have no products.</h3>
    <?php } ?>


    <?php require_once('inc/footer.inc.php') ?>


    <script type="text/javascript">
        function onPageSearch(q) {
            let main_products_div = document.getElementById('main_products_div');
            let prods =document.getElementsByClassName('product');
            let filtered =document.getElementsByClassName(`b_${q}`);
            
            for(let prod of prods){
                prod.style.display = 'none';
            }
            for(let x of filtered){
                x.style.display = '';
            }
        }
    </script>

</body>

</html>