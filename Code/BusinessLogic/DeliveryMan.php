<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/JetDelivery/DatabaseLayer/DeliveryQueries.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/JetDelivery/BusinessLogic/User.php';


class DeliveryMan extends User
{
    private $deliveryQueries;

    public function __construct()
    {
        $this->deliveryQueries = new DeliveryQueries();
    }

    public function assignDelivery(){
        $result = $this->deliveryQueries->assignDelivery();
        return $result;
    }

    public function getDeliveryID($userID){
        $result = $this->deliveryQueries->getDeliveryID($userID);
        return $result;
    }

    public function confirmDelivery($orderID,$date)
    {
        $result = $this->deliveryQueries->confirmDelivery($orderID,$date);
        return $result;
    }

}