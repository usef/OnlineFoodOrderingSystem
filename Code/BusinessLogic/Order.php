<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/JetDelivery/DatabaseLayer/OrderQueries.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/JetDelivery/DatabaseLayer/ItemQueries.php';

class Order
{
    public $orderID;
    public $customerID;
    public $orderDate;
    public $deliveryDate;
    public $status;
    public $totalPrice;
    public $deliveryManID;
    public $promocode;
    public $paymentMethodID;
    private $orderQueries;

    /**
     * Order constructor.
     * @param $orderQueries
     */
    public function __construct()
    {
        $this->orderQueries = new OrderQueries();
    }

    public function addOrder(){
        $result = $this->orderQueries->addOrder($this->customerID, $this->orderDate,$this->status,$this->totalPrice,$this->deliveryManID,$this->promocode,$this->paymentMethodID);
        return $result;
    }

    public function addSale(){
        $itemQ = new ItemQueries();
        foreach ($_SESSION['CartItems'] as $item){
            $itemQ->soldItem($item['ID'],$item['Quantity']);
            $this->orderQueries->addSale($item['ID'],$item['Restaurant'],$item['Quantity']);
        }
    }

    public function getOrders(){
        $result = $this->orderQueries->getOrders();
        return $result;
    }

    public function getCustomerOrders($customerID){
        $result = $this->orderQueries->getCustomerOrders($customerID);
        return $result;
    }

    public function getDeliveryOrders($deliveryID){
        $result = $this->orderQueries->getDeliveryOrders($deliveryID);
        return $result;
    }

    public function deleteOrder(){
        $result = $this->orderQueries->deleteOrder($this->orderID);
        return $result;
    }
}