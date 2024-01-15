<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/cust_required.inc.php');

if (isset($_SESSION['b_id'])) {
    header('location: index.php');
    exit;
}

$empty = false;

$q = "select * from savedcarts where c_id = " . $_SESSION['c_id'] . " ;";
$res = mysqli_query($db, $q) or die(mysqli_error($db));

if (mysqli_num_rows($res) == 0) {
    $empty = true;
}

$counter = 1;

?>


<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <h3 class="brown text-center my-5"> Your Saved Carts <i class="fa-solid fa-cart-shopping"></i></h3>

    <?php if (!$empty) { ?>


        <div class="justify-content-center row">
            <div class="table-responsive col-md-9 ">
                <table
                    class="table table-bordered border-warning table-warning align-middle">
                    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                        <tr>
                            <td class="p-4">
                                <h3 cl>Cart
                                    <?php echo $counter ?>
                                </h3>
                                <div class="row row-cols-3 row-cols-md-6">
                                    <?php $l = "select * from products where p_id in (" . substr($row['p_ids'], 0, strlen($row['p_ids']) - 1) . ");";
                                    $lres = mysqli_query($db, $l) or die(mysqli_error($db));
                                    while ($lrow = mysqli_fetch_assoc($lres)) {
                                        ?>
                                        <div class="card text-bg-warning m-1" style="max-width: 18rem;--bs-bg-opacity:.3;">
                                        <div class="text-center my-2" >
                                            <img src="<?php echo $lrow['p_pic']?>" alt="..." class="card-img-top w-75">
                                        </div>
                                            <div class="card-header bold brown">
                                                <?php echo $lrow['p_name'] ?>
                                            </div>
                                            <div class="card-body">
                                                <small class="card-text brown">
                                                    <?php echo substr($lrow['p_desc'],0,25).'...' ?>
                                                </small>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="remove_from_saved.php?p=<?php echo substr($row['p_ids'], 0, strlen($row['p_ids']) - 1) ?>"
                                        class="btn btn-danger m-1">Remove</a>
                                    <a href="move_to_cart.php?p=<?php echo substr($row['p_ids'], 0, strlen($row['p_ids']) - 1) ?>"
                                        class="btn btn-success m-1">Add to Cart</a>
                                </div>
                            </td>
                        </tr>
                        <?php $counter++;
                    } ?>
                </table>
            </div>
        </div>


    <?php } else { ?>
        <h3 class="brown text-center my-5"> You have no saved carts.</h3>
    <?php } ?>


    <?php require_once('inc/footer.inc.php') ?>


</body>

</html>