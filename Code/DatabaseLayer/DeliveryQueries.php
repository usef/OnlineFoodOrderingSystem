<?php
include_once 'UserQueries.php';

class DeliveryQueries extends UserQueries
{

    /**
     * DeliveryQueries constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function assignDelivery(){
        $query="SELECT * FROM delivery_men ORDER BY RAND() LIMIT 1";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data['User 1']['ID'];
    }

    public function getDeliveryID($userID){
        $query = "SELECT ID FROM delivery_men WHERE User_ID=$userID";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data['User 1']['ID'];
    }

    public function confirmDelivery($orderID,$date){
        $query = "UPDATE orders SET Delivery_DateTime='$date',Status='Delivered' WHERE ID = $orderID";
        $result = $this->db->query($query);
        return $result;
    }
}
