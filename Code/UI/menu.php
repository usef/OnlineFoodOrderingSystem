<?php
session_start();
include_once '../BusinessLogic/Item.php';
$item = new Item();

if(!isset($_POST['RestaurantID'])){
    header("Location: restaurants.php");
} else {
    $item->restaurantID = $_POST['RestaurantID'];
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Staple Food a Restaurants Category Bootstrap Responsive website Template | Products :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Staple Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
    <!-- //Custom Theme files -->
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
    <!-- //web-fonts -->

</head>
<body>
<!-- banner -->
<div class="banner about-w3bnr">
    <?php include_once 'header.php'; ?>
    <!-- banner-text -->
    <div class="banner-text">
        <div class="container">
            <h2>Delicious food from the <br> <span>Best Chefs For you.</span></h2>
        </div>
    </div>
</div>
<!-- //banner -->
<!-- breadcrumb -->
<div class="container">
    <ol class="breadcrumb w3l-crumbs">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dishes</li>
    </ol>
</div>
<!-- //breadcrumb -->

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center
                ">
                <div class="page-section">
                    <h1 class="page-title">Food Menu</h1>
                </div>
            </div>
        </div>
        <div class="row">
<!--            <form action="products.php" method="post">-->
            <!-- starter -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                <div class="menu-block">
                    <h3 class="menu-title">Starter</h3>
                    <?php
                    $items = $item->getRestaurantItems();
                    foreach ($items as $item){
                        if($item['Active'] == 1){
                            echo '<form action="products.php" method="post"><div class="menu-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="dish-img"><a href="#"><img  width="70" height="70" src="'.$item['Image_URL'].'" alt="" class="img-circle"></a></div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="dish-content">
                                    <h5 class="dish-title"><a href="#"><input hidden name="ItemID" value="'.$item['ID'].'"><input type="submit" style="border: none; background: none; padding: 0;" value="'.$item['Name'].'"></a> </h5>
                                    <span class="dish-meta">'.$item['Description'].'</span>
                                    <div class="dish-price">
                                        <p>$'.$item['Price'].'</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div></form>';
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- /.starter -->
<!--            <!-- Soup -->-->
<!--            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">-->
<!--                <div class="menu-block">-->
<!--                    <h3 class="menu-title">Soup</h3>-->
<!--                    --><?php
//                    foreach ($items as $item){
//                        if($item['Active'] == 1){
//                            echo '<div class="menu-content">
//                        <div class="row">
//                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
//                                <div class="dish-img"><a href="#"><img width="70" height="70" src="'.$item['Image_URL'].'" alt="" class="img-circle"></a></div>
//                            </div>
//                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
//                                <div class="dish-content">
//                                    <h5 class="dish-title"><a href="#"><input hidden name="ItemID" value="'.$item['ID'].'"><input type="submit" style="border: none; background: none; padding: 0;" value="'.$item['Name'].'"></a> </h5>
//                                    <span class="dish-meta">'.$item['Description'].'</span>
//                                    <div class="dish-price">
//                                        <p>$'.$item['Price'].'</p>
//                                    </div>
//                                </div>
//
//                            </div>
//                        </div>
//                    </div>';
//                        }
//                    }
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--            <!-- /.soup -->-->
<!--            <!-- main course -->-->
<!--            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">-->
<!--                <div class="menu-block">-->
<!--                    <h3 class="menu-title">Main Course</h3>-->
<!--                    --><?php
//                    foreach ($items as $item){
//                        if($item['Active'] == 1){
//                            echo '<div class="menu-content">
//                        <div class="row">
//                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
//                                <div class="dish-img"><a href="#"><img  width="70" height="70" src="'.$item['Image_URL'].'" alt="" class="img-circle"></a></div>
//                            </div>
//                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
//                                <div class="dish-content">
//                                    <h5 class="dish-title"><a href="#"><input hidden name="ItemID" value="'.$item['ID'].'"><input type="submit" style="border: none; background: none; padding: 0;" value="'.$item['Name'].'"></a> </h5>
//                                    <span class="dish-meta">'.$item['Description'].'</span>
//                                    <div class="dish-price">
//                                        <p>$'.$item['Price'].'</p>
//                                    </div>
//                                </div>
//
//                            </div>
//                        </div>
//                    </div>';
//                        }
//                    }
//                    ?>
<!--                </div>-->
<!--            </div>-->
            <!-- /.main Course -->
<!--            </form>-->
        </div>
    </div>
</div>
<!-- /.menu -->

<!-- subscribe -->
<div class="subscribe agileits-w3layouts">
    <div class="container">
        <div class="col-md-6 social-icons w3-agile-icons">
            <h4>Keep in touch</h4>
            <ul>
                <li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
                <li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
                <li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
                <li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
                <li><a href="#" class="fa fa-rss icon rss"> </a></li>
            </ul>
            <ul class="apps">
                <li><h4>Download Our app : </h4></li>
                <li><a href="#" class="fa fa-apple"></a></li>
                <li><a href="#" class="fa fa-windows"></a></li>
                <li><a href="#" class="fa fa-android"></a></li>
            </ul>
        </div>
        <div class="col-md-6 subscribe-right">
            <h3 class="w3ls-title">Subscribe to Our <br><span>Newsletter</span></h3>
            <form action="#" method="post">
                <input type="email" name="email" placeholder="Enter your Email..." required="">
                <input type="submit" value="Subscribe">
                <div class="clearfix"></div>
            </form>
            <img src="images/i1.png" class="sub-w3lsimg" alt=""/>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //subscribe -->
<?php include_once 'footer.php'; ?>
<!-- cart-js -->
<script src="js/minicart.js"></script>
<script>
    w3ls.render();

    w3ls.cart.on('w3sb_checkout', function (evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {
            }
        }
    });
</script>
<!-- //cart-js -->
<!-- Owl-Carousel-JavaScript -->
<script src="js/owl.carousel.js"></script>
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            items: 3,
            lazyLoad: true,
            autoPlay: true,
            pagination: true,
        });
    });
</script>
<!-- //Owl-Carousel-JavaScript -->
<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" id="sourcecode">
    $(function () {
        $('.scroll-pane').jScrollPane();
    });
</script>
<!-- //the jScrollPane script -->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script> <!-- the mouse wheel plugin -->
<!-- start-smooth-scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- //smooth-scrolling-of-move-up -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.js"></script>
</body>
</html>