<?php

include_once 'UserQueries.php';

class RestaurantQueries extends UserQueries
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllRestaurants()
    {
        $query = "SELECT * FROM restaurants";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

    public function addRestaurant($name, $numberOfBranches, $status, $delivery, $manager)
    {
        $query = "INSERT INTO restaurants VALUES (NULL, '$name',$numberOfBranches,'$status',$delivery,$manager)";
        $result = $this->db->query($query);
        return $result;
    }

    public function getRestaurant($name)
    {
        $query = "SELECT * FROM restaurants WHERE Name='$name'";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

    public function addRestaurantAddress($id, $street, $city)
    {
        $query = "INSERT INTO restaurants_addresses VALUES ($id,'$street','$city')";
        $result = $this->db->query($query);
        return $result;
    }

    public function deleteRestaurant($restaurantId)
    {
        $query = "DELETE FROM restaurants WHERE id=$restaurantId";
        $result = $this->db->query($query);
        return $result;
    }

    public function updateRestaurant($id, $name, $numberOfBranches, $status, $deliveryFee, $manager)
    {
        $query = "UPDATE restaurants SET Name='$name',Branch_Numbers=$numberOfBranches,Status='$status',Delivery_Fee=$deliveryFee,Manager_ID=$manager WHERE ID = $id";
        $result = $this->db->query($query);
        return $result;
    }

    public function getManagerRestaurants($managerID){
        $query = "SELECT * FROM restaurants WHERE Manager_ID=$managerID";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

}