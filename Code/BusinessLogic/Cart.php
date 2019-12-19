<?php


class Cart
{
    public $itemCount = 0;

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        if(!empty($_SESSION['CartItems'])){
            $this->itemCount = count($_SESSION['CartItems']);
        }
    }

    public function addToCart(){
        $item = array("ID" => $_POST['ID'], "Name" => $_POST['Name'], "Price" => $_POST['Price'], "Quantity" => $_POST['Quantity'], "Image" => $_POST['Image'], "Restaurant" => $_POST['RestaurantID']);
        $id = $_POST['ID'];
        $_SESSION['CartItems'][$id] = $item;
        $this->itemCount = count($_SESSION['CartItems']);
    }

    public function removeFromCart(){
        if(!empty($_SESSION['CartItems'])){
            foreach ($_SESSION['CartItems'] as $key => $value){
                if($_POST['ID'] == $key){
                    unset($_SESSION['CartItems'][$key]);
                }
                if(empty($_SESSION['CartItems'])){
                    unset($_SESSION['CartItems']);
                }
            }
        }

        if(!empty($_SESSION['CartItems'])){
            $this->itemCount = count($_SESSION['CartItems']);
        }
    }

//    public function emptyCart(){
//        unset($_SESSION['CartItems']);
//        $this->itemCount = 0;
//    }

}