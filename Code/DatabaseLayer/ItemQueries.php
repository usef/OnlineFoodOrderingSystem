<?php

include_once 'UserQueries.php';

class ItemQueries extends UserQueries
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getItems()
    {
        $query = "SELECT i.*, c.Name AS Category,r.Name AS Restaurant FROM items i JOIN categories c ON c.ID=i.Category_ID JOIN restaurants r ON r.ID=i.Restaurant_ID";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

     public function addItem($name,$price,$quantity,$description,$categoryID,$restaurantID,$active,$imageURL){
        $query="INSERT  INTO items VALUES (NULL,'$name','$price',$quantity,'$description',$categoryID,$restaurantID,$active,'$imageURL')";
        $result= $this->db->query($query);
        return $result;
    }

    public function deleteItem($itemID){
        $query="DELETE FROM items WHERE ID = $itemID";
        $result= $this->db->query($query);
        return $result;
    }

     public function updateItem($itemID,$name,$price,$quantity,$description,$categoryID,$restaurantID,$active,$imageURL){
        $query="UPDATE items SET Name='$name',Price=$price,Quantity=$quantity,Description='$description',Category_ID=$categoryID,Restaurant_ID=$restaurantID,Active=$active,Image_URL='$imageURL' WHERE ID='$itemID'";
        $result= $this->db->query($query);
        return $result;
    }

    public function soldItem($itemID,$quantity){
        $query = "UPDATE items SET Quantity=Quantity-$quantity WHERE ID=$itemID";
        $result = $this->db->query($query);
        return $result;
    }

    public function getRestaurantItems($restaurantID){
        $query = "SELECT * FROM items WHERE Restaurant_ID = $restaurantID";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

    public function getItem($itemID){
        $query = "SELECT * FROM items WHERE ID=$itemID";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data['User 1'];
    }
}