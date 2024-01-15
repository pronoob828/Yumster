<nav id="navbar" class="navbar navbar-expand-lg bg-warning" style="z-index: 1;">
    <div class="container-fluid brown bold">
        <a class="navbar-brand brown text-center p-1" href="index.php" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Go to Homepage">
            <h3><i class="fa-solid fa-utensils"></i> Yumster</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <span class="nav-item d-flex mx-3">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <?php if (isset($_SESSION['b_id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Your Products</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"><span data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Dropdown">
                                    <strong class="px-2">
                                        <?php echo substr($_SESSION['b_name'], 0, 20); ?>
                                        <i class="fa-solid fa-user"></i>
                                    </strong></span></a>
                            <ul class="dropdown-menu dropdown-menu-end bg-warning" id="dropmenu"
                                aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item brown bold" href="business.php">Your Business</a>
                                </li>
                                <li>
                                    <hr>
                                </li>
                                <li>
                                    <a class="dropdown-item brown bold" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php } elseif (isset($_SESSION['c_id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="browse.php">Browse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart <i class="fa-solid fa-cart-shopping"></i> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="saved_carts.php">Saved Carts <i class="fa-solid fa-cart-shopping"></i> </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"><span data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Dropdown">
                                    <strong class="px-2">
                                        <?php echo substr($_SESSION['c_name'], 0, 20); ?>
                                        <i class="fa-solid fa-user"></i>
                                    </strong></span></a>
                            <ul class="dropdown-menu dropdown-menu-end bg-warning" id="dropmenu"
                                aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item brown bold" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="browse.php">Browse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>


                    <?php } ?>
            </span>
        </div>
    </div>
</nav>