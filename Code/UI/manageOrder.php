<?php
session_start();
include_once '../BusinessLogic/Order.php';
$order = new Order();

$order->orderID = $_POST['ID'];

if ($_SESSION['userTypeID'] != 1) {
    header("Location: index.php");
}

if (isset($_POST['delete'])) {
    if ($order->deleteOrder()) {
        header("Location: manageAll.php");
    } else {
        echo 'An error occurred.';
    }
}