<?php
session_start();
include_once '../BusinessLogic/Restaurant.php';
$restaurant = new Restaurant();
$message = '';
if(isset($_POST['add'])){
    $restaurant->id = "";
    $restaurant->name = "";
    $restaurant->numberOfBranches = "";
    $restaurant->status = "";
    $restaurant->deliveryFee = "";
    $restaurant->manager = "";
} else {
    $restaurant->id = $_POST['ID'];
    $restaurant->name = $_POST['Name'];
    $restaurant->numberOfBranches = $_POST['NumberOfBranches'];
    $restaurant->status = $_POST['Status'];
    $restaurant->deliveryFee = $_POST['DeliveryFee'];
    $restaurant->manager = $_POST['Manager'];
}

if ($_SESSION['userTypeID'] != 1) {
    header("Location: index.php");
}

if (isset($_POST['updateRestaurant'])) {
    $result = $restaurant->updateRestaurant();
    if ($result) {
        $message = '<div class="alert alert-success" role="alert">Successfully edited.</div>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">An error has occurred while trying to update your information.</div>';
    }
} elseif(isset($_POST['addNew'])){
    $result = $restaurant->addRestaurant();
    if ($result) {
        $message = '<div class="alert alert-success" role="alert">Successfully added.</div>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">An error has occurred while trying to add your information.</div>';
    }
}

if (isset($_POST['delete'])) {
    if ($restaurant->removeRestaurant()) {
        header("Location: manageAll.php");
    } else {
        echo 'An error occurred.';
    }
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
                        <div class="card">
                            <div class="header">
                                <?php
                                    if($restaurant->id == ""){
                                        echo '<h4 class="title">Add Restaurant</h4>';
                                    } else {
                                        echo '<h4 class="title">Edit Restaurant</h4>';
                                    }
                                ?>
                            </div>
                            <div class="content">
                                <?php if ($message != "") {
                                    echo $message;
                                } ?>
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <?php
                                                    if($restaurant->id == ""){
                                                        echo '<input hidden name="ID" value=""><input type="text" class="form-control" disabled placeholder="ID">';
                                                    } else {
                                                        echo '<input hidden name="ID" value="'.$restaurant->id.'">
                                                <input type="text" class="form-control" disabled placeholder="ID"
                                                       value="'.$restaurant->id.'">';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Manager ID</label>
                                                <input type="text" class="form-control" name="Manager" placeholder="Manager ID"
                                                       value="<?php echo $restaurant->manager; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="Name"
                                                       placeholder="Restaurant Name"
                                                       value="<?php echo $restaurant->name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Number of Branches</label>
                                                <input type="text" class="form-control" name="NumberOfBranches"
                                                       placeholder="Number of Branches"
                                                       value="<?php echo $restaurant->numberOfBranches ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="Status">
                                                    <?php
                                                    if ($restaurant->status == "ON") {
                                                        echo '<option value="ON" selected>ON</option>';
                                                        echo '<option value="OFF" >OFF</option>';
                                                    } else {
                                                        echo '<option value="ON" >ON</option>';
                                                        echo '<option value="OFF" selected>OFF</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Delivery Fee</label>
                                                <input type="text" class="form-control" name="DeliveryFee"
                                                       placeholder="Delivery Fee"
                                                       value="<?php echo $restaurant->deliveryFee; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address"
                                                       disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code"
                                                       disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <!--                                    <div class="row">-->
                                    <!--                                        <div class="col-md-12">-->
                                    <!--                                            <div class="form-group">-->
                                    <!--                                                <label>About Me</label>-->
                                    <!--                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <?php
                                        if(empty($restaurant->name)){
                                            echo '<button type="submit" name="addNew" class="btn btn-info btn-fill pull-right">Add Restaurant</button>';
                                        } else {
                                            echo '<button type="submit" name="updateRestaurant" class="btn btn-info btn-fill pull-right">Update Restaurant</button>';
                                        }
                                    ?>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
                    <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
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
