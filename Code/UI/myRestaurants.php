<?php
session_start();

include_once '../BusinessLogic/Restaurant.php';
$restaurant = new Restaurant();

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}

if(isset($_POST['delete'])){
    if($restaurant->removeRestaurant()){
        header("Refresh:0");
    } else {
        echo 'An error occurred';
    }
} else {

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

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>
</head>
<body>

<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">My Restaurants</h4>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>Name</th>
                                    <th>Number of Branches</th>
                                    <th>Status</th>
                                    <th>Delivery Fee</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $restaurants = $restaurant->getManagerRestaurants($_SESSION['id']);

                                    foreach ($restaurants as $restaurant) {
                                        echo '<form action="" method="post"><tr><input hidden name="ID" value="' . $restaurant['ID'] . '">';
                                        echo '<input hidden name="Name" value="' . $restaurant['Name'] . '"><td>' . $restaurant['Name'] . '</td>';
                                        echo '<input hidden name="NumberOfBranches" value="' . $restaurant['Branch_Numbers'] . '"><td>' . $restaurant['Branch_Numbers'] . '</td>';
                                        echo '<input hidden name="Status" value="' . $restaurant['Status'] . '"><td>' . $restaurant['Status'] . '</td>';
                                        echo '<input hidden name="DeliveryFee" value="' . $restaurant['Delivery_Fee'] . '"><td>' . $restaurant['Delivery_Fee'] . '</td>';
                                        echo '<td><button type="submit" name="delete" class="btn btn-warning">Delete</button></td></tr></form>';
                                    }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
