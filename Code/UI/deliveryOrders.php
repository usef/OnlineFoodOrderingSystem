<?php
session_start();
include_once '../BusinessLogic/Order.php';
include_once '../BusinessLogic/DeliveryMan.php';

date_default_timezone_set('Africa/Cairo');
$date = date('Y-m-d h:i:s', time());

if(!isset($_SESSION['FName']) || $_SESSION['userTypeID'] != 5){
    header("Location: index.php");
}

$delivery = new DeliveryMan();

if(isset($_POST['confirm'])){
    $delivery->confirmDelivery($_POST['OrderID'],$date);
    header("Refresh:0");
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
                                <h4 class="title">My Orders</h4>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>ID</th>
                                    <th>Order Date & Time</th>
                                    <th>Delivery Date & Time</th>
                                    <th>Status</th>
                                    <th>Total Price</th>
                                    <th>Payment Method</th>
                                    <th>Confirm Delivery</th>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $order = new Order();
                                    $deliveryID = $delivery->getDeliveryID($_SESSION['id']);
                                    $orders = $order->getDeliveryOrders($deliveryID);

                                    foreach ($orders as $order) {
                                        echo '<form action="" method="post"><tr><input hidden name="OrderID" value="'.$order['ID'].'"><td>' . $order['ID'] . '</td>';
                                        echo '<td>' . $order['Order_DateTime'] . '</td>';
                                        echo '<td>' . $order['Delivery_DateTime'] . '</td>';
                                        echo '<td>' . $order['Status'] . '</td>';
                                        echo '<td>' . $order['Total_Price'] . '</td>';
                                        echo '<td>' . $order['Payment_Method'] . '</td>';
                                        if($order['Status'] == "Delivered"){
                                            echo '<td>Delivered</td></tr></form>';
                                        } else {
                                            echo '<td><input type="submit" name="confirm" value="Confirm Delivery"></td></tr></form>';
                                        }
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
