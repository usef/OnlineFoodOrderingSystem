<?php
session_start();
include_once '../BusinessLogic/PromoCode.php';
$promo = new PromoCode();
$message = '';

if(isset($_POST['add'])){
    $promo->code = "";
    $promo->value = "";
    $promo->activeDate = "";
    $promo->expiryDate = "";
    $promo->usesAllowed = "";
    $promo->status = "";
} else {
    $promo->code = $_POST['Code'];
    $promo->value = $_POST['Value'];
    $promo->activeDate = $_POST['ActiveDate'];
    $promo->expiryDate = $_POST['ExpiryDate'];
    $promo->usesAllowed = $_POST['UsesAllowed'];
    $promo->status = $_POST['Status'];
}


if ($_SESSION['userTypeID'] != 1) {
    header("Location: index.php");
}

if (isset($_POST['updateCode'])) {
    $result = $promo->updateCode();
    if ($result) {
        $message = '<div class="alert alert-success" role="alert">Successfully edited.</div>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">An error has occurred while trying to update your information.</div>';
    }
} elseif(isset($_POST['addNew'])){
    $result = $promo->addCode();
    if ($result) {
        $message = '<div class="alert alert-success" role="alert">Successfully added.</div>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">An error has occurred while trying to add your information.</div>';
    }
}

if (isset($_POST['delete'])) {
    if ($promo->deleteCode()) {
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
                                    if($promo->code == ""){
                                        echo '<h4 class="title">Add Promocode</h4>';
                                    } else {
                                        echo '<h4 class="title">Edit Promocode</h4>';
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
                                                <label>Code</label>
                                                <?php if($promo->code==""){
                                                    echo '<input type="text" name="Code" class="form-control" placeholder="Code"
                                                       value="">';
                                                } else {
                                                    echo '<input hidden name="Code" value="'.$promo->code.'">
                                                <input type="text" class="form-control" disabled placeholder="Code"
                                                       value="'.$promo->code.'">';
                                                }?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Value</label>
                                                <input type="text" class="form-control" placeholder="Value"
                                                       name="Value" value="<?php echo $promo->value; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Active Date</label>
                                                <input type="date" class="form-control" placeholder="Active Date"
                                                       name="ActiveDate" value="<?php echo $promo->activeDate; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Expiry Date</label>
                                                <input type="date" class="form-control" placeholder="Expiry Date"
                                                       name="ExpiryDate" value="<?php echo $promo->expiryDate; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Uses Allowed</label>
                                                <input type="text" class="form-control" placeholder="Uses Allowed"
                                                       name="UsesAllowed" value="<?php echo $promo->usesAllowed; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Status</label>
                                                <select name="Status" class="form-control">
                                                    <?php
                                                        if($promo->status == 0){
                                                            echo '<option selected value="0">OFF</option>';
                                                            echo '<option value="1">ON</option>';
                                                        } else {
                                                            echo '<option value="0">OFF</option>';
                                                            echo '<option selected value="1">ON</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if($promo->code == ""){
                                            echo '<button type="submit" name="addNew" class="btn btn-info btn-fill pull-right">Add
                                        Promocode
                                    </button>';
                                        } else {
                                            echo '<button type="submit" name="updateCode" class="btn btn-info btn-fill pull-right">Update
                                        Promocode
                                    </button>';
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
