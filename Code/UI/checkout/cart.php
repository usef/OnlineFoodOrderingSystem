<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once '../../BusinessLogic/Cart.php';
include_once '../../BusinessLogic/PromoCode.php';

$cart = new Cart();

$discountValue = 0;
$msg = '';
if(isset($_POST['promocode'])){
    $promo = new PromoCode();
    $promos = $promo->getCodes();
    foreach ($promos as $promo){
        if($promo['Status'] == 1){
            if($promo['Code'] == $_POST['promocode']){
                $_SESSION['promoUsed'] = $promo['Code'];
                $discountValue = $promo['Value'];
                break;
            }
        }
    }
    if($discountValue != 0){
        $msg = '<div class="alert alert-success" role="alert">Successfully applied promocode.</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">The code you entered is invalid, or has expired.</div>';
    }
}


if (isset($_POST['remove'])) {
    $cart->removeFromCart();
}

//if (isset($_POST['empty'])) {
//    $cart->emptyCart();
//}

if (!isset($_SESSION['Username'])) {
    header("Location: ../login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    ">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="shopping-cart.css">
</head>
<body>
<main class="page">
    <section class="shopping-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2>Shopping Cart</h2>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            <?php
                            $subtotalPrice = 0;
                            if (!isset($_SESSION['CartItems'])) {
                                echo 'Empty Cart.';
                            } else {
                                foreach ($_SESSION['CartItems'] as $item) {
                                    echo '<form action="" method="post"><div class="product">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input hidden name="ID" value="'.$item['ID'].'">
                                        <img class="img-fluid mx-auto d-block image" src="../' . $item['Image'] . '">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-4 product-name">
                                                    <div class="product-name">
                                                        <a href="#">' . $item['Name'] . '</a>
                                                        <div class="product-info">
                                                            <div>Restaurant: <span class="value">' . $item['Restaurant'] . '</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 quantity">
                                                    <label for="quantity">Quantity:</label>
                                                    <input id="quantity" type="number" name="Quantity" value ="' . $item['Quantity'] . '" class="form-control quantity-input">
                                                </div>
                                                <div class="col-md-3 price">
                                                    <span>$' . $item['Price'] . '</span>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="submit" class="btn btn-labeled btn-danger fa-close" name="remove" value="X">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div></form>';
                                    $subtotalPrice += $item['Price'] * $item['Quantity'];
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Summary</h3>
                            <div class="summary-item"><span class="text">Subtotal</span><span
                                        class="price">$<?php echo $subtotalPrice; ?></span>
                            </div>
                            <div class="summary-item"><span class="text">Discount</span><span class="price">$<?php echo $discountValue;?></span>
                            </div>
                            <div class="summary-item"><span class="text">Shipping</span><span class="price">$0</span>
                            </div>
                            <?php if($subtotalPrice>0 && $subtotalPrice>$discountValue){
                                $totalPrice = $subtotalPrice - $discountValue;
                            } else {
                                $totalPrice = 0;
                            }?>
                            <div class="summary-item"><span class="text">Total</span><span class="price">$<?php echo $totalPrice;?></span>
                            </div>
                            <form action="" method="post">
                                <div class="p-2">
                                    <input type="text" name="promocode" value="" class="form-control" placeholder="Promo code">
                                    <div>
                                        <button type="submit" class="btn btn-secondary">Redeem</button>
                                        <?php echo $msg;?>
                                    </div>
                                </div>
                            </form>
                            <form action="payment.php" method="post">
                                <input hidden name="total" value="<?php echo $totalPrice?>">
                                <button type="submit" name="checkout" class="btn btn-primary btn-lg btn-block">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>