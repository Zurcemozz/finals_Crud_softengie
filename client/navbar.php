<?php
if (!isset($_SESSION['Admin'])) {
    $user_login = "Guest!";
} else {
    if ($_SESSION['Admin'] == 'test') {
        $user_login = $_SESSION['Admin'];
    } else {
        $user_login = $_SESSION['Username'];
    }
}

if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
} else {
    $count = 0;
}
?>

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top shadow-sm p-3  bg-body rounded">
    <div class="container-fluid px-5">
        <a class="navbar-brand fw-bold" ref="#" href="index.php">E-Com</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li> -->


            </ul>
            <span class="navbar-text ">
                <a href="cart.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span id="cart_count"> <?php echo $count; ?></span>
                </a>
            </span>
            <span class="navbar-text align-items-center  d-flex ms-5">
                <?php if (!isset($_SESSION['Admin'])) { ?>
                    <p class="pt-3">Hello Guest!</p>
                    <a href="client/login.php" class="btn btn-outline-primary ms-5"> Login </a>

                <?php } else { ?>
                    <?php if ($_SESSION['Admin'] == 'test') { ?>
                        <p class="pt-3">Hello <?php echo $user_login; ?> </p>
                        <a href="client/logout.php" class="btn btn-outline-primary ms-5"> Logout </a>
                    <?php } else { ?>
                        <p class="pt-3">Hello <?php echo $user_login; ?> </p>
                        <a href="client/logout.php" class="btn btn-outline-primary ms-5"> Logout </a>
                    <?php } ?>
                <?php } ?>
            </span>
        </div>
    </div>
</nav>