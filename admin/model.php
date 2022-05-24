<?php
require('../connection/connection.php');

//Add Image
function uploadImage($img)
{
    $temp_loc = $img['tmp_name'];
    $new_name = random_int(11111, 99999) . $img['name'];
    $new_loc = '../products/' . $new_name;
    if (!move_uploaded_file($temp_loc, $new_loc)) {
        header("location: dashboard.php?alert=img_upload");
        exit;
    } else {
        return $new_name;
    }
}

//Remove Image
function imageRemove($img)
{
    if (!unlink('../products/' . $img)) {
        header("location: dashboard.php?alert=img_rem_fail");
    } else {
        echo "Unable to Delete";
    }
}


//Add new Product   
if (isset($_POST['addProduct'])) {
    $con = connection();
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $desc = $_POST['product_desc'];

    $imgpath = uploadImage($_FILES['product_image']);

    $stmt = $con->prepare("INSERT INTO `product_table`(`product_name`,`product_price`, `product_desc`, `product_image`) VALUES('$name', '$price', '$desc', '$imgpath') ");
    header('Location: dashboard.php?success=added');

    $stmt->execute();
}

//Delete Product
if (isset($_GET['rem']) && $_GET['rem'] > 0) {
    $con = connection();

    $query = "SELECT * FROM product_table WHERE `id`='$_GET[rem]' ";
    $result = mysqli_query($con, $query);
    $fetch = mysqli_fetch_assoc($result);

    imageRemove($fetch['product']);

    $query = "DELETE  from `product_table` where `id`='$_GET[rem]'";

    if (mysqli_query($con, $query)) {
        header("location: dashboard.php?success=removed");
    } else {
        header("location: dashboard.php?=alert=add_failed");
    }
}



//EDIT PRODUCT_TABLE
if (isset($_POST['editproduct'])) {
    $con = connection();


    $name = $_POST["product_name"];
    $price = $_POST["product_price"];
    $desc = $_POST["product_desc"];

    if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
        $query = "SELECT * FROM product_table WHERE `id`='$_GET[editid]' ";
        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);

        imageRemove($fetch['image']);
        $imgpath = uploadImage($_FILES['image']);

        $update = "UPDATE  `product_table` SET `product_name`='$name', `product_price`='$price', `product_desc`='$desc', `product_image`='$imgpath' WHERE `id`=$_POST[editid] ";
    } else {
        $update = "UPDATE  `product_table` SET `product_name`='$name', `product_price`='$price', `product_desc`='$desc' WHERE `id`=$_POST[editid] ";
    }

    if (mysqli_query($con, $update)) {
        header("location: dashboard.php?success=updated");
    } else {
        header("location: dashboard.php?alert=update_failed");
    }
}


//Render TOTAL PRODUCTS
function renderAllProducts()
{
    $con = connection();

    $sql = $con->query("SELECT * FROM product_table") or die($con->error);
    return $sql;
}

//Total product_desc

function getTotalProducts()
{
    $con = connection();
    $result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `product_table`");
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    return $count;
}
