<?php

session_start();
require('./connection/connection.php');
$con = connection();
$product_id = array_column($_SESSION['cart'], 'id');
$result = $con->query("SELECT * from product_table") or die($con->error);
if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
    <?php require('./client/navbar.php'); ?>


    <br>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])) {

                        while ($row = $result->fetch_assoc()) {
                            foreach ($product_id as $id) {
                                if ($row['id'] == $id) { ?>
                                    <form action="cart.php?action=remove&id=<?php echo $row['id']; ?>" method="post" class="cart-items">
                                        <div class="border rounded">
                                            <div class="row bg-white">
                                                <div class="col-md-3 ps-0">
                                                    <img src=<?php echo './products/' . $row['product_image']; ?> alt="image-1" class="img-fluid product_image">
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="pt-2"> <?php echo $row['product_name']; ?> </h5>
                                                    <small class="text-secondary"> Seller: Asda</small>
                                                    <h5 class="pt-2"> Php <?php echo $row['product_price']; ?> </h5>
                                                    <button type="submit" class="btn btn-warning">Save for Later</button>
                                                    <button type="submit" class="btn btn-danger mx-2" name="remove"> Remove</button>
                                                </div>
                                                <div class="col-md-3 py-5">
                                                    <div>
                                                        <button type="button" class="btn bg-light border rounded-circle"> <i class="fas fa-minus"></i> </button>
                                                        <input type="text" value="1" readonly="readonly" class="form-control w-25 d-inline">
                                                        <button type="button" class="btn bg-light border rounded-circle"> <i class="fas fa-plus"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    $total = $total + (int)$row['product_price'];
                                    ?>

                        <?php }
                            }
                        }
                    } else { ?>
                        <?php echo "No Cart!" ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border-rounded mt-5 bg-white h-25">
                <div class="p4">
                    <h1>Price Details</h1>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php if (isset($_SESSION['cart'])) {
                                $count =  count($_SESSION['cart']);
                            ?>
                                <h6>Price <?php echo $count ?> Items</h6>
                            <?php } else { ?>
                                <h6>Price <?php echo $count ?> Items</h6>
                            <?php } ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Total</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$ <?php echo $total; ?> </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>