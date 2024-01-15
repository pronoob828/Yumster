<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/business_required.inc.php');



$q = "select * from products where p_id = " . $_GET['p'] . ";";

$res = mysqli_query($db, $q) or die(mysqli_error($db));

if (mysqli_num_rows($res) == 0) {
    echo "No such product";
    header("Location: products.php");
    exit;
}

$row = mysqli_fetch_assoc($res);
if ($_SESSION['b_id'] != $row['b_id']) {
    echo "FORBIDDEN";
    header("Location: products.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <div class="text-center justify-content-center row">
        <div class="container col-md-4 col-sm-10 p-3 bg-warning my-3 border rounded brown" style="--bs-bg-opacity:.3;">
            <div class="my-3">
                <form id="picform" action="process_update_product_pic.php" method="post" enctype="multipart/form-data">
                </form>
                <label for="pic" class="btn btn-info m-3" style="position:absolute">Edit</label>
                <input type="hidden" form="picform" name="pid" id="pid" value="<?php echo $row['p_id'] ?>">
                <input name="pic" id="pic" form="picform" type="file" class="form-control form-control-sm d-none"
                    onchange="this.form.submit()">
                <img src="<?php echo $row['p_pic'] ?>" alt="..." class="img-fluid">
            </div>
            <form id="deleteform" action="process_delete_product.php" method="post">
            </form>
            <form id="updateform" class="border rounded border-warning p-3" action="process_update_product.php"
                method="post">
                <input type="hidden" name="pid" value="<?php echo $row['p_id'] ?>">
                <input type="text" name="pname" id="pname" class="form-control  mt-3 text-center bold"
                    value="<?php echo $row['p_name'] ?>" placeholder="Name">

                <textarea class="form-control mt-3 " name="desc" id="desc"
                    placeholder="Description"><?php echo $row['p_desc'] ?></textarea>
                <textarea class="form-control mt-3 " name="nutrition" placeholder="Nutrition Facts"
                    id="nutrition"><?php echo $row['p_nutrition'] ?></textarea>

                <div class="container mx-auto my-3">
                    <span class="bold">Price</span><input type="number" name="price" id="price" class="form-control"
                        value="<?php echo $row['p_price'] ?>">
                </div>
                <input type="submit" form="updateform" value="Update" class="btn btn-warning bold my-3 brown d-inline">
                <input type="hidden" form="deleteform" name="pid" value="<?php echo $row['p_id'] ?>">
                <input form="deleteform" type="submit" value="Delete Product"
                    class="btn btn-danger bold text-white d-inline">
            </form>
        </div>
    </div>

    <?php require_once('inc/footer.inc.php') ?>

</body>