<?php
include_once 'ItemQueries.php';

class OrderQueries extends ItemQueries
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getOrders(){
        $query="SELECT o.*,p.Payment_Method FROM orders o JOIN payment_method p on o.Payment_Method_ID=p.ID";
        $result= $this->db->query($query);
        $data= $this->db->resultAssoc($result);
        return $data;
    }

    public function getCustomerOrders($customerID){
        $query = "SELECT o.*,p.Payment_Method FROM orders o JOIN payment_method p on o.Payment_Method_ID=p.ID WHERE Customer_ID=$customerID";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

    public function addOrder($customerID,$orderDate,$status,$totalPrice,$deliveryManID,$promocode,$paymentMethodID){
        $query="INSERT INTO orders VALUES (NULL,$customerID,'$orderDate',NULL,'$status',$totalPrice,$deliveryManID,'$promocode',$paymentMethodID)";
        $result= $this->db->query($query);
        return $result;
    }

    public function deleteOrder($orderId){
        $query="DELETE FROM orders WHERE ID=$orderId";
        $result= $this->db->query($query);
        return $result;
    }

    public function getLastOrder(){
        $query = "SELECT ID,Order_DateTime Date FROM orders Order by ID DESC LIMIT 1";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data['User 1'];
    }

    public function addSale($itemID,$restaurantID,$quantity){
        $lastOrder = $this->getLastOrder();
        $orderID = $lastOrder['ID'];
        $soldDate = $lastOrder['Date'];
        $query = "INSERT INTO sales VALUES (NULL,$itemID,$orderID,$restaurantID,'$soldDate',$quantity)";
        $result = $this->db->query($query);
        return $result;
    }

    public function getDeliveryOrders($deliveryID){
        $query = "SELECT o.*,p.Payment_Method FROM orders o JOIN payment_method p on o.Payment_Method_ID=p.ID WHERE o.Delivery_Man_ID=$deliveryID";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }
}