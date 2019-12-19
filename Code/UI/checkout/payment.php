<?php
session_start();

include_once '../../BusinessLogic/Order.php';
include_once '../../BusinessLogic/Customer.php';
include_once '../../BusinessLogic/DeliveryMan.php';

date_default_timezone_set('Africa/Cairo');
$date = date('Y-m-d h:i:s', time());
$msg = '';
if(isset($_POST['cod']) && !empty($_SESSION['CartItems'])){
    $order = new Order();
    $cust = new Customer();
    $order->customerID = $cust->getCustomerID($_SESSION['id']);
    $order->orderDate = $date;
    $order->status = "Accepted";
    $order->totalPrice = $_POST['total'];
    if(isset($_SESSION['promoUsed'])){
        $order->promocode = $_SESSION['promoUsed'];
    } else {
        $order->promocode = NULL;
    }
    $deliveryMan = new DeliveryMan();
    $deliveryManID = $deliveryMan->assignDelivery();
    $order->deliveryManID = $deliveryManID;
    $order->paymentMethodID = 3;
    $orderDone = $order->addOrder();

    if($orderDone){
        $order->addSale();
        $msg = '<div class="alert alert-success" role="alert">Order placed successfully.</div>';
        unset($_SESSION['CartItems']);
    } else {
        $msg = '<div class="alert alert-danger" role="alert">An error occurred.</div>';
    }
} elseif(empty($_SESSION['CartItems'])) {
    $msg = '<div class="alert alert-danger" role="alert">Your cart is empty.</div>';
}
if(empty($_SESSION['CartItems'])){
    $totalPrice = 0;
} else {
    $totalPrice = $_POST['total'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="payment.css">
</head>
<body>
<main class="page payment-page">
    <section class="payment-form dark">
        <div class="container">
            <div class="block-heading">
                <h2>Payment</h2>
            </div>
            <form action="" method="post">
                <div class="products">
                    <?php echo $msg;?>
                    <h3 class="title">Checkout</h3>
                    <?php
                    if (!isset($_SESSION['CartItems'])) {
                        echo 'Empty Cart.';
                    } else {
                        foreach ($_SESSION['CartItems'] as $item){
                            echo '<div class="item">
                        <span class="price">$'.$item['Price'].'</span>
                        <p class="item-name">'.$item['Name'].'</p>
                        </div>';
                        }
                    }
                    echo '<div class="total">Total<span class="price">$'.$totalPrice.'</span></div>';
                    ?>
                </div>
                    <div class="row">
                        <div class="col-sm-12 mx-auto">
                            <div class="card ">
                                <div class="card-header">
                                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                        <!-- Credit card form tabs -->
                                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                            <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                                            <li class="nav-item"> <a data-toggle="pill" href="#cod" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Cash On Delivery </a> </li>
                                        </ul>
                                    </div> <!-- End -->
                                    <!-- Credit card form content -->
                                    <div class="tab-content">
                                        <!-- credit card info-->
                                        <div id="credit-card" class="tab-pane fade show active pt-3">
                                            <form role="form">
                                                <div class="form-group"> <label for="username">
                                                        <h6>Card Owner</h6>
                                                    </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                                <div class="form-group"> <label for="cardNumber">
                                                        <h6>Card number</h6>
                                                    </label>
                                                    <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                                            <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                            </label> <input type="text" required class="form-control"> </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer"> <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                            </form>
                                        </div>
                                    </div> <!-- End -->
                                    <!-- Paypal info -->
                                    <div id="paypal" class="tab-pane fade pt-3">
                                        <h6 class="pb-2">Select your paypal account type</h6>
                                        <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                                        <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                                        <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                                    </div> <!-- End -->
                                    <!-- cash on delivery -->
                                    <div id="cod" class="tab-pane fade pt-3">
                                        <div class="form-group">
                                            <form action="" method="post">
                                                <input hidden name="total" value="<?php echo $totalPrice;?>">
                                                <p> <button type="submit" name="cod" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed </button> </p>
                                            </form>
                                        </div>
                                    </div> <!-- End -->
                                    <!-- End -->
                                </div>
                            </div>
                        </div>
                </div>
            </form>
        </div>
    </section>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>