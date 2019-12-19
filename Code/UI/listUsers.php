<?php
session_start();
include_once '../BusinessLogic/User.php';
$user = new User();

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


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet"/>


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
                                <h4 class="title">Users list</h4>
                                <p class="category">You can see all the users of the system here</p>
                            </div>
                            <form action="" method="post">
                                <select class="form-control pull-right" name="usertype">
                                    <option value="0" selected>All</option>
                                    <?php
                                    $usertypes = $user->getUserTypes();
                                    foreach ($usertypes as $type) {
                                        echo '<option value="' . $type['ID'] . '">' . $type['Name'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <input name="filter" class="btn btn-light pull-right" type="submit" value="Filter">
                            </form>
                            <form action="manageUser.php" method="post">
                                <input name="add" class="btn btn-light pull-right" type="submit" value="Add User">
                            </form>
                            <!--                            <div class="col-xs-2">-->
                            <!--                                <input class="form-control" id="searchID" type="text" placeholder="Search By ID" onkeypress="">-->
                            <!--                            </div>-->
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Type</th>
                                    <th>Activated</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if ((isset($_POST['usertype']) && $_POST['usertype'] == 0) || !isset($_POST['usertype'])) {
                                        $users = $user->getAllUsers();
                                    } else {
                                        $users = $user->getUsersByType($_POST['usertype']);
                                    }

                                    foreach ($users as $user) {
                                        if ($user['Active'] == 1) {
                                            $active = "Yes";
                                        } else {
                                            $active = "No";
                                        }
                                        echo '<form action="manageUser.php" method="post"><tr><input hidden name="id" value="' . $user['User_ID'] . '"><td>' . $user['User_ID'] . '</td>';
                                        echo '<input hidden name="Email" value="' . $user['Email'] . '"><td>' . $user['Email'] . '</td>';
                                        echo '<input hidden name="Username" value="' . $user['Username'] . '"><td>' . $user['Username'] . '</td>';
                                        echo '<input hidden name="FName" value="' . $user['FName'] . '"><td>' . $user['FName'] . '</td>';
                                        echo '<input hidden name="LName" value="' . $user['LName'] . '"><td>' . $user['LName'] . '</td>';
                                        echo '<input hidden name="UserTypeID" value="'.$user['Type_ID'].'"><td>' . $user['usertype'] . '</td>';
                                        echo '<input hidden name="Active" value="'.$user['Active'].'"><td>' . $active . '</td>';
                                        echo '<td><button type="submit" name="update" class="btn btn-success">Update</button></td>';
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

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
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
