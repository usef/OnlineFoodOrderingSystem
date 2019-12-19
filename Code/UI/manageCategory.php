<?php
session_start();
include_once '../BusinessLogic/Category.php';
$category = new Category();
$message = '';

if(isset($_POST['add'])) {
    $category->categoryID = "";
    $category->categoryName = "";
} else {
    $category->categoryID = $_POST['ID'];
    $category->categoryName = $_POST['Name'];
}

if ($_SESSION['userTypeID'] != 1) {
    header("Location: index.php");
}

if (isset($_POST['updateCategory'])) {
    $result = $category->updateCategory();
    if ($result) {
        $message = '<div class="alert alert-success" role="alert">Successfully edited.</div>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">An error has occurred while trying to update your information.</div>';
    }
} elseif(isset($_POST['addNew'])){
    $result = $category->addCategory();
    if ($result) {
        $message = '<div class="alert alert-success" role="alert">Successfully added.</div>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">An error has occurred while trying to add your information.</div>';
    }
}

if (isset($_POST['delete'])) {
    if ($category->deleteCategory()) {
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
                                if($category->categoryID == ""){
                                    echo '<h4 class="title">Add Category</h4>';
                                } else {
                                    echo '<h4 class="title">Edit Category</h4>';
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
                                                <input hidden name="ID" value="<?php echo $category->categoryID; ?>">
                                                <input type="text" class="form-control" disabled placeholder="ID"
                                                       value="<?php echo $category->categoryID; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name</label>
                                                <input type="text" class="form-control" placeholder="Category Name"
                                                       name="Name" value="<?php echo $category->categoryName; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if($category->categoryID == ""){
                                       echo '<button type="submit" name="addNew" class="btn btn-info btn-fill pull-right">Add
                                        Category
                                    </button>';
                                    } else {
                                        echo '<button type="submit" name="updateCategory" class="btn btn-info btn-fill pull-right">Update
                                        Category
                                    </button>';
                                    }?>
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
