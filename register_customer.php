<?php require_once('inc/db.inc.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('inc/head.inc.php') ?>

<body class="bg-warning-subtle">
    <?php require_once('inc/header.inc.php') ?>

    <div class="container container-sm col-md-6 my-5" data-aos="fade-up">
        <form action="process_customer_register.php" method="post" class="form-control bg-warning" style="--bs-bg-opacity:.3" >
            <h3 class="brown text-center" >Customer Registration</h3>

            <label class="form-label" for="name">Name</label>
            <input class="form-control mb-3" id="name" type="text" name="name" placeholder="Full Name">
            <label class="form-label" for="email">Email</label>
            <input class="form-control mb-3" id="email" type="email" name="email" placeholder="Email">
            <label class="form-label" for="phone">Phone</label>
            <input class="form-control mb-3" id="phone" type="text" name="phone" placeholder="Phone Number">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control mb-3" placeholder="password">
            <label for="confirmpassword">Confirm Password</label>
            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control mb-3"
                placeholder="Confirm password">

            <div class="text-center">
                <input type="button" value="Reset" class="btn btn-secondary">
                <input type="submit" name="submit" id="submit_btn" class="btn btn-warning m-auto" value="Register">
            </div>

        </form>
    </div>
    <?php require_once('inc/footer.inc.php') ?>

</body>

</html>