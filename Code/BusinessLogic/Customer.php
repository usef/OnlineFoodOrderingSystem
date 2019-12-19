<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/JetDelivery/DatabaseLayer/CustomerQueries.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/JetDelivery/BusinessLogic/User.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/JetDelivery/BusinessLogic/Wallet.php';

class Customer extends User
{
    public $customerID;
    private $city;
    private $street;
    private $houseNumber;
    private $wallet;
    private $customerQueries;

    public function __construct()
    {
        $this->customerQueries = new CustomerQueries();
        $this->wallet = new Wallet();
    }

    public function getCustomerID($userID){
        $this->customerID = $this->customerQueries->getCustomerID($userID);
        return $this->customerID;
    }

}