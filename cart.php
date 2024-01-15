<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/cust_required.inc.php');

if (isset($_SESSION['b_id'])) {
    header('location: index.php');
    exit;
}

$empty = false;
$q = "select * from products where p_id in (select p_id from carts where c_id = " . $_SESSION['c_id'] . ");";
$res = mysqli_query($db, $q) or die(mysqli_error($db));

if (mysqli_num_rows($res) == 0) {
    $empty = true;
}
?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        update_total();
    })
    function update_total() {
        let total = document.getElementById('total');
        let prices = document.getElementsByClassName('prices')
        let t = 0;
        for (let price of prices) {
            t += parseInt(price.innerHTML);
        };
        total.innerHTML = t;
    }
    function update_qty(qty, price, p_id) {
        let a = document.getElementById(`price${p_id}`)
        let b = price * parseInt(qty);
        a.innerHTML = b;
        update_total();
    };
</script>

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <h3 class="brown text-center mt-5 mb-3"> Your Cart <i class="fa-solid fa-cart-shopping"></i></h3>

    <?php if (!$empty) { ?>
        <form class="text-center" action="clear_cart.php" id="clear" >
            <input type="submit" class="btn btn-danger btn-small" value="Clear Cart">
        </form>

        <form id="orderlater" action="add_to_orderlater.php" method="post" >
        </form>
        <form id="orderform" action="process_order.php" method="post" >

            <div class="card-group row row-cols-1 row-cols-md-2 row-cols-lg-4 mb-5 mx-1">
                <?php while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <div class="col mt-1">
                        <div class="card h-100 text-center bg-warning" style="--bs-bg-opacity:.3;">
                            <a href="<?php echo 'view_product.php?p=' . $row['p_id'] ?>" class="brown">
                                <img src="<?php echo $row['p_pic'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $row['p_name'] ?>
                                    </h5>
                                    <p class="card-text">
                                        <?php echo substr($row['p_desc'], 0, 50) . '...' ?>
                                    </p>
                                    <h2 class="mb-2">₹
                                        <span class="prices" id="price<?php echo $row['p_id'] ?>">
                                            <?php echo $row['p_price'] ?>
                                        </span>
                                    </h2>
                                </div>
                            </a>
                            <div class="container w-50 text-center mb-3 brown">
                                <span>Qty</span>
                                <input type="number" name="qty<?php echo $row['p_id'] ?>" id="qty<?php echo $row['p_id'] ?>"
                                    class="form-control bg-warning-subtle" min="1" value="1"
                                    onkeyup="update_qty(this.value,<?php echo $row['p_price'] ?>,<?php echo $row['p_id'] ?>)">
                            </div>
                            <div class="card-footer">
                                <a href="remove_from_cart.php?p=<?php echo $row['p_id'] ?>" class="btn btn-danger m-2">Remove
                                    from
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="container w-50 text-center mb-3">
                <h2 class="brown">Total : ₹ <span id="total"></span></h2>
                <input form="orderform" type="submit" value="Order" class="btn btn-success btn-lg">
                <input form="orderlater" type="submit" value="Order Later" class="btn btn-info btn-lg">
            </div>
        </form>

    <?php } else { ?>
        <h3 class="brown text-center my-5"> Your Cart is Empty.</h3>
    <?php } ?>


    <?php require_once('inc/footer.inc.php') ?>


</body>

</html>