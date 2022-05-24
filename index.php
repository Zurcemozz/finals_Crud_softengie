<?php

if (!isset($_SESSION)) {
    session_start();
}
//Get ID

if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], 'id');

        if (in_array($_POST['id'], $item_array_id)) {
            echo "<script> alert('Aready in Cart') </script>";
            echo "<script> window.location='index.php' </script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'id' => $_POST['id']

            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array(
            'id' => $_POST['id']

        );
        //Create new Session
        $_SESSION['cart'][0] = $item_array;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Com</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <?php require('./client/navbar.php'); ?>
    <?php require('./client/header.php'); ?>

    <hr>
    <div class="display-1 text-center">Products</div>
    <hr>
    <?php require('./connection/connection.php');
    $con = connection();
    $sql = $con->query("SELECT * FROM product_table") or die($con->error);

    ?>
    <div class="container">
        <div class="row d-flex">
            <?php while ($row = $sql->fetch_assoc()) { ?>
                <div class="col-md-3 col-sm-6 my-3 my-md-0 ">
                    <form action="index.php" method="post">

                        <div class="card m-2 shadow-sm p-3 m bg-body rounded" style="width: 18rem;">
                            <img src="<?php echo './products/' . $row['product_image']; ?>" class="img-fluid card-img-top product_image" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                                <p class="card-text">
                                    ₱ <?php echo $row['product_price']; ?>
                                </p>
                                <button name="add" href="#" class="btn btn-primary">Add To Cart</button>
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>

        </div>
    </div>
    <?php require('./client/footer.php'); ?>
</body>

</html>