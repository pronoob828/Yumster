<?php require_once('inc/db.inc.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <div class="container col-sm-12 col-md-6 my-5" data-aos="fade-up">
        <form action="process_business_register.php" method="post" enctype="multipart/form-data"
            class="bg-warning form-control px-3" style="--bs-bg-opacity:.3;">
            <h3 class="text-center brown">Business Registration</h3>
            <div class="row my-3">
                <input class="form-control col mx-1" required id="oname" type="text" name="oname"
                    placeholder="Owner's Full Name">
                <input class="form-control col mx-1" required id="bname" type="text" name="bname" placeholder="Business Name">
            </div>
            <div class="row my-3">
                <input class="form-control col mx-1" required id="oemail" type="email" name="oemail" placeholder="Owner's Email">
                <input class="form-control col mx-1" required id="bemail" type="email" name="bemail"
                    placeholder="Business Email">
            </div>
            <div class="row my-3">
                <input class="form-control col mx-1" id="ophone" type="text" name="ophone"
                    placeholder="Owner's Phone Number">
                <input class="form-control col mx-1" id="bphone" type="text" name="bphone"
                    placeholder="Business Phone Number">
            </div>
            <input type="text" name="state" id="state"required  class="form-control mb-3" placeholder="State">
            <input type="text" name="city" id="city"required  class="form-control mb-3" placeholder="City">
            <input type="text" name="address" id="address"required  class="form-control mb-3" placeholder="Street Address">

            <textarea class="form-control my-3" name="desc" id="desc" rows="3" placeholder="Description"></textarea>
            <div>
                <input type="file" multiple name="pics[]" id="pics" class="form-control mt-3">
                <!-- <small class="text-center text-danger">JPEG files ONLY!</small> -->
            </div>

            <input type="password" name="password"required  id="password" class="form-control my-3" placeholder="password">
            <input type="password" name="confirmpassword"required  id="confirmpassword" class="form-control mb-3"
                placeholder="Confirm password">

            <div class="text-center">
                <input type="reset" value="Reset" class="btn btn-secondary">
                <input type="submit" name="submit" id="submit_btn" class="btn btn-warning m-auto" value="Register">
            </div>

        </form>
    </div>
    <?php require_once('inc/footer.inc.php') ?>
</body>

</html>