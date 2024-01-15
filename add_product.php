<?php require_once('inc/db.inc.php');
session_start();
require_once('inc/business_required.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>
    <div class="container col-sm-12 col-md-6 my-5" data-aos="fade-up">
        <form action="process_add_product.php" method="post" enctype="multipart/form-data"
            class="bg-warning form-control px-3" style="--bs-bg-opacity:.3;">
            <h3 class="text-center brown mt-3">Add Product</h3>
            
            <input type="text" name="pname" id="pname" class="form-control mt-3" placeholder="Product Name" >
            <input type="number" name="pprice" id="pprice" class="form-control mt-3" placeholder="₹ Price" >

            <textarea name="desc" id="desc" class="form-control mt-3" placeholder="Describe your product" ></textarea>
            <textarea name="nutrition" id="nutrition" class="form-control mt-3" placeholder="Nutrition Facts" ></textarea>

            <div class="my-3">
                <label for="pic" class="form-label">Product Image</label>
                <input type="file" name="pic" id="pic" class="form-control">
            </div>
            <div class="text-center">
                <input type="reset" value="Reset" class="btn btn-secondary">
                <input type="submit" name="submit" id="submit_btn" class="btn btn-warning m-auto" value="Add Product">
            </div>

        </form>
    </div>

    <?php require_once('inc/footer.inc.php') ?>

</body>

</html>