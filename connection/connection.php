<?php

function connection()
{
    $dbname = "final";
    $dbserver = "localhost";
    $dbpassword = "123456";
    $dbusername = "root";

    $con = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
    if ($con->connect_error) {
        echo "Error?";
        echo $con->connect_error;
    } else {

        return $con;
    }
}
