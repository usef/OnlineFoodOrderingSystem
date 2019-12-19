<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Staple Food a Restaurants Category Bootstrap Responsive website Template | Menu :: w3layouts</title>
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
        <li class="active">Menu</li>
    </ol>
</div>
<!-- //breadcrumb -->
<!-- menu list -->
<div class="wthree-menu">
    <img src="images/i2.jpg" class="w3order-img" alt=""/>
    <div class="container">
        <h3 class="w3ls-title">Restaurants</h3>
        <p class="w3lsorder-text">Here your Staple Food Varieties</p>
        <div class="menu-agileinfo">
            <?php
            include_once '../BusinessLogic/Restaurant.php';
            $restaurant = new Restaurant();
            $data = $restaurant->getAllRestaurants();
            foreach ($data as $restaurant) {
                if($restaurant['Status'] == 'ON'){
                    echo '<form action="menu.php" method="post">
<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids"><a><input hidden name="RestaurantID" value="'.$restaurant['ID'].'"><input type="submit" style="border: none; background: none; padding: 0;" value="' . $restaurant['Name'] . '"></a></div></form>';
                }
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //menu list -->
<!-- add-products -->
<div class="add-products">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">Today's Offers</h3>
        <div class="add-products-row">
            <div class="w3ls-add-grids">
                <a href="products.php">
                    <h4>Get <span>10%<br>Cashback</span></h4>
                    <h5>Special Offer Today Only</h5>
                    <h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                </a>
            </div>
            <div class="w3ls-add-grids w3ls-add-grids-right">
                <a href="products.php">
                    <h4>GET Upto<span><br>5% Offer</span></h4>
                    <h5>On Order Lunch Today</h5>
                    <h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //add-products -->
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