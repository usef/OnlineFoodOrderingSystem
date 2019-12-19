<?php
session_start();

if ($_SESSION['userTypeID'] != 1) {
    header("Location: login.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>

</head>
<body>

<div class="wrapper">
    <?php include_once 'adminPanel.php'; ?>

    <div class="main-panel">
        <?php include_once 'adminNav.php'; ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <input name="tab" class="btn btn-light" type="submit" value="Restaurants">
                            <input name="tab" class="btn btn-light" type="submit" value="Items">
                            <input name="tab" class="btn btn-light" type="submit" value="Categories">
                            <input name="tab" class="btn btn-light" type="submit" value="Orders">
                            <input name="tab" class="btn btn-light" type="submit" value="Promocodes">
                        </form>
                        <?php
                        if (!isset($_POST['tab']) || $_POST['tab'] == "Restaurants") {
                            include_once 'listRestaurants.php';
                        } elseif ($_POST['tab'] == "Items") {
                            include_once 'listItems.php';
                        } elseif ($_POST['tab'] == "Categories") {
                            include_once 'listCategories.php';
                        } elseif ($_POST['tab'] == "Orders") {
                            include_once 'listOrders.php';
                        } elseif ($_POST['tab'] = "Promocodes") {
                            include_once 'listCodes.php';
                        }
                        ?>

                        <footer class="footer">
                            <div class="container-fluid">
                                <nav class="pull-left">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                Home
                                            </a>
                                        </li>

                                    </ul>
                                </nav>
                                <p class="copyright pull-right">
                                    &copy;
                                    <script>document.write(new Date().getFullYear())</script>
                                    <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better
                                    web
                                </p>
                            </div>
                        </footer>

                    </div>
                </div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


</html>
