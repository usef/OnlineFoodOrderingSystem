<!-- header -->
<div class="header">
    <div class="w3ls-header"><!-- header-one -->
        <div class="container">
            <div class="w3ls-header-left">
                <p> home delivery at your doorstep For Above $30</p>
            </div>
            <div class="w3ls-header-right">
                <ul>
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (!isset($_SESSION['Username'])) {
                        echo '<li class="head-dpdn"><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>';
                        echo '<li class="head-dpdn"><a href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a></li>';
                    } else {
                        echo '<li class="head-dpdn"><i aria-hidden="true"></i>Welcome, <a href="myProfile.php">' . $_SESSION['FName'] . '</a></li>';
                        echo '<li class="head-dpdn"><a href="logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a></li>';
                    }
                    ?>
                    <li class="head-dpdn">
                        <a href="offers.php"><i class="fa fa-gift" aria-hidden="true"></i> Offers</a>
                    </li>
                    <li class="head-dpdn">
                        <a href="help.php"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //header-one -->
    <!-- navigation -->
    <div class="navigation agiletop-nav">
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header w3l_logo">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                            data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a href="index.php">JetDelivery<span>Best Restaurants Collection</span></a></h1>
                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php" class="active">Home</a></li>
                        <!-- Mega Menu -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Restaurants<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-12 , navrest "><h6>Restaurant Type</h6></div>
                                    <div class="col-sm-6">
                                        <ul class="multi-column-dropdown">
                                            <h6><a href="restaurants.php">Arabic Food</a></h6>
                                            <li>Tunisian food</li>
                                            <li>Egyptian food</li>
                                            <li>Syrian food</li>
                                            <li>Moroccan food</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="multi-column-dropdown">
                                            <h6><a href="restaurants.php">Wastern Food</a></h6>
                                            <li>Indian Food</li>
                                            <li>American Food</li>
                                            <li>French Food</li>
                                            <li>Italian Food</li>
                                        </ul>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                        <li><a href="contact.php">Most Selling</a></li>
                        <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-haspopup="true" aria-expanded="false">Pages <span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                include_once '../BusinessLogic/User.php';
                                $u = new User();
                                $u->userTypeID = $_SESSION['userTypeID'];
                                $links = $u->getUserPermissions();
                                foreach ($links as $link){
                                    echo '<li><a href="'.$link['URL'].'">'.$link['Name'].'</a></li>';
                                }

                                ?>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="cart cart box_1">
                    <a href="checkout">
                        <input type="hidden" name="cmd" value="_cart"/>
                        <input type="hidden" name="display" value="1"/>
                        <button class="w3view-cart" type="submit" name="submit" value=""><i
                                    class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                    </a>
                </div>
            </nav>
        </div>
    </div>
    <!-- //navigation -->
</div>
<!-- //header-end -->