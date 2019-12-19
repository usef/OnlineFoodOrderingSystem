<?php
//session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Staple Food a Restaurants Category Bootstrap Responsive website Template | Products :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Staple Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design"/>
    <!-- Custom Theme files -->
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="../css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
    <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
    <!-- //Custom Theme files -->
    <!-- js -->
    <script src="../js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- //web-fonts -->
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">

<!-- banner -->
<div class="banner about-w3bnr">
    <!-- header -->
    <div class="header">
        <div class="w3ls-header"><!-- header-one -->
            <div class="container">
                <div class="w3ls-header-left">
                    <p> home delivery at your doorstep For Above $30</p>
                </div>
                <div class="w3ls-header-right">
                    <ul>
                        <?php
                        if (!isset($_SESSION)) {
                            session_start();
                        }
                        if (!isset($_SESSION['Username'])) {
                            echo '<li class="head-dpdn"><a href="../login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>';
                            echo '<li class="head-dpdn"><a href="../signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a></li>';
                        } else {
                            echo '<li class="head-dpdn"><i aria-hidden="true"></i>Welcome, <a href="../manageProfile.php">' . $_SESSION['FName'] . '</a></li>';
                            echo '<li class="head-dpdn"><a href="../logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a></li>';
                        } ?>
                        <li class="head-dpdn">
                            <a href="offers.php"><i class="fa fa-gift" aria-hidden="true"></i> Offers</a>
                        </li>
                        <li class="head-dpdn">
                            <a href="help.php"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //header-one -->    <!-- banner-text -->
<!--    <div class="banner-text">-->
<!--        <div class="container">-->
<!--            <h2>Delicious food from the <br> <span>Best Restaurants For you.</span></h2>-->
<!--        </div>-->
<!--    </div>-->
</div>
<!-- //banner -->
<!--<div style="height: 60px"></div>-->
<?php include_once 'cart.php';?>
<!-- //subscribe -->
<?php include_once '../footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
