<?php

include_once '../DatabaseLayer/RestaurantQueries.php';

class Restaurant
{
    public $id;
    public $name;
    public $numberOfBranches;
    public $status;
    public $street;
    public $city;
    public $deliveryFee;
    public $manager;
    private $restaurantQueries;

    /**
     * Restaurant constructor.
     */
    public function __construct()
    {
        $this->restaurantQueries = new RestaurantQueries();
    }

    public function getRestaurant()
    {
        $result = $this->restaurantQueries->getRestaurant($this->name);
        $this->id = $result['User 1']['ID'];
        $this->numberOfBranches = $result['User 1']['Branch_Numbers'];
        $this->status = $result['User 1']['Status'];
        $this->deliveryFee = $result['User 1']['Delivery_Fee'];
        $this->manager = $result['User 1']['Manager_ID'];
        return $result;
    }

    public function getAllRestaurants()
    {
        $data = $this->restaurantQueries->getAllRestaurants();
        return $data;
    }

    public function addRestaurant()
    {
        $result = $this->restaurantQueries->addRestaurant($this->name, $this->numberOfBranches, $this->status, $this->deliveryFee, $this->manager);
        return $result;
    }

    public function addRestaurantAddress()
    {
        $result = $this->restaurantQueries->addRestaurantAddress($this->id, $this->street, $this->city);
        return $result;
    }

    public function updateRestaurant()
    {
        $result = $this->restaurantQueries->updateRestaurant($this->id, $this->name, $this->numberOfBranches, $this->status, $this->deliveryFee, $this->manager);
        return $result;
    }

    public function removeRestaurant()
    {
        $result = $this->restaurantQueries->deleteRestaurant($this->id);
        return $result;
    }

    public function getManagerRestaurants($managerID)
    {
        $result = $this->restaurantQueries->getManagerRestaurants($managerID);
        return $result;
    }
}
