<?php
session_start();
unset($_SESSION['access']);
unset($_SESSION['UserLogin']);
session_destroy();
header("Location: ../index.php");
