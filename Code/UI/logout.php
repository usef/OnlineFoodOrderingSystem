<?php
include_once '../BusinessLogic/User.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['Username'])) {
    $user = new User();
    $result = $user->logout();
    if ($result) {
        header("Location: index.php");
    } else {
        die();
    }
} else {
    header("Location: index.php");
}