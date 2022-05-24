<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['Username'])) {
    $username = $_SESSION['Username'];
} else {
    header("Location: ../index.php ");
    exit;
}


require('./model.php');
$sql = renderAllProducts();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>

    </style>
    <title>Admin</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100 ">
            <div class="col-sm-2 text-white sidebar shadow-lg">
                <?php require('./sidebar.php'); ?>

            </div>
            <div class="col-sm-10">
                <div>
                    <?php require('./topbar.php'); ?>
                </div>
                <div>
                    <?php require('./tables.php'); ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>