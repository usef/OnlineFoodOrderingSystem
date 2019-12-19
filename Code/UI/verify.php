<?php
include_once '../BusinessLogic/User.php';
if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {

    $verifyUser = new User();
    $verifyUser->email = $_GET['email'];
    $verifyUser->hash = $_GET['hash'];
    $verified = $verifyUser->verifyUser();

    if ($verified) {
        header("Location: login.php?success=1");
    } else {
        header("Location: login.php?success=0");
    }
} else {
    echo '<div class="statusmsg">Invalid approach, please use the link that has been sent to your email.</div>';
}