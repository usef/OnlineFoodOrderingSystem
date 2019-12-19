<?php
session_start();
include_once '../BusinessLogic/Item.php';
$item = new Item();
$message = '';

if(isset($_POST['add'])) {
    $item->itemID = "";
    $item->name = "";
    $item->price = "";
    $item->quantity = "";
    $item->description = "";
    $item->categoryID = "";
    $item->restaurantID = "";
    $item->active = "";
    $item->itemImage = "";
} else {
    $item->itemID = $_POST['ID'];
    $item->name = $_POST['Name'];
    $item->price = $_POST['Price'];
    $item->quantity = $_POST['Quantity'];
    $item->description = $_POST['Description'];
    $item->categoryID = $_POST['CategoryID'];
    $item->restaurantID = $_POST['RestaurantID'];
    $item->active = $_POST['Active'];
    $item->itemImage = $_POST['ImageURL'];
}

if ($_SESSION['userTypeID'] != 1) {
    header("Location: index.php");
}

if (isset($_POST['updateItem'])) {
    $result = $item->updateItem();
    if ($result) {
        $message = '<div class="alert alert-success" role="alert">Successfully edited.</div>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">An error has occurred while trying to update your information.</div>';
    }
} elseif(isset($_POST['addNew'])){
    $result = $item->addItem();
    if ($result) {
        $message = '<div class="alert alert-success" role="alert">Successfully added.</div>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">An error has occurred while trying to add your information.</div>';
    }
}

if (isset($_POST['delete'])) {
    if ($item->deleteItem()) {
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
                                if($item->itemID == ""){
                                    echo '<h4 class="title">Add Item</h4>';
                                } else {
                                    echo '<h4 class="title">Edit Item</h4>';
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
                                                <input hidden name="ID" value="<?php echo $item->itemID; ?>">
                                                <input type="text" class="form-control" disabled placeholder="ID"
                                                       value="<?php echo $item->itemID; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" name="Name" class="form-control" placeholder="Name"
                                                       value="<?php echo $item->name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" class="form-control" name="Price"
                                                       placeholder="Price" value="<?php echo $item->price; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="text" class="form-control" name="Quantity"
                                                       placeholder="Quantity" value="<?php echo $item->quantity; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Restaurant</label><br>
                                                <select class="form-control" name="RestaurantID">
                                                    <?php
                                                    include_once '../BusinessLogic/Restaurant.php';
                                                    $restaurant = new Restaurant();
                                                    $restaurants = $restaurant->getAllRestaurants();

                                                    foreach ($restaurants as $restaurant){
                                                        if($restaurant['ID'] == $item->restaurantID){
                                                            echo '<option selected value="'.$restaurant['ID'].'">'.$restaurant['Name'].'</option>';
                                                        } else {
                                                            echo '<option value="'.$restaurant['ID'].'">'.$restaurant['Name'].'</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control" name="CategoryID">
                                                    <?php
                                                    include_once '../BusinessLogic/Category.php';
                                                    $category = new Category();
                                                    $categories = $category->getCategories();

                                                    foreach ($categories as $category) {
                                                        if ($item->categoryID == $category['ID']) {
                                                            echo '<option value="' . $category['ID'] . '" selected>' . $category['Name'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $category['ID'] . '">' . $category['Name'] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Active</label>
                                                <select class="form-control" name="Active">
                                                    <?php
                                                    if ($item->active == 1) {
                                                        echo '<option value="1" selected>ON</option>';
                                                        echo '<option value="0">OFF</option>';
                                                    } else {
                                                        echo '<option value="1">ON</option>';
                                                        echo '<option value="0" selected>OFF</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image URL</label>
                                                <input class="form-control" type="text" name="ImageURL" placeholder="Image URL" value="<?php echo $item->itemImage;?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="Description" rows="5" class="form-control"
                                                          placeholder="Here can be your description"
                                                          value="<?php echo $item->description; ?>>"><?php echo $item->description; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if($item->itemID == ""){
                                            echo '<button type="submit" name="addNew" class="btn btn-info btn-fill pull-right">Add Item</button>';
                                        } else {
                                            echo '<button type="submit" name="updateItem" class="btn btn-info btn-fill pull-right">Update Item</button>';
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
