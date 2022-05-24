<?php
require('../connection/connection.php');
session_start();



if (isset($_POST['addAccount'])) {
    $con = connection();

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $checkIfExisting = mysqli_query($con, "SELECT * FROM `admin_table` Where `username` = '$username' or `email` = '$email'");

    if (!mysqli_num_rows($checkIfExisting) > 0) {
        $stmt = $con->prepare("INSERT INTO `admin_table` (`email`, `username`, `password`) VALUE('$email','$username','$password')");
        header("Location:login.php?alert=sucessful ");
        $stmt->execute();
    } else {
        header("Location:register.php?alert=login_failed ");

        exit;
    }
}

if (isset($_POST['login'])) {
    $con = connection();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $selectUser = $con->query("SELECT * from `admin_table` where username = '$username' and password = '$password'") or die($selectUser);
    $row = $selectUser->fetch_assoc();
    $user = $selectUser->num_rows;

    if ($user == 1) {
        $_SESSION['Username'] = $row['username'];
        $_SESSION['Admin'] = $row['admin'];

        if ($row['admin'] === 'test') {
            header("Location: ../admin/dashboard.php");
            exit;
        } else if ($row['admin'] !== 'test') {
            header("Location: ../index.php");
        }
    } else {
        header("Location:login.php?alert=login_failed ");
        echo "Wrong Username or Password";
    }
}


function renderAllProducts()
{
    $con = connection();

    $sql = $con->query("SELECT * FROM product_table") or die($con->error);
    return $sql;
}
