<?php
include_once 'UserQueries.php';

class CustomerQueries extends UserQueries
{


    /**
     * CustomerQueries constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getCustomerID($userID){
        $query = "SELECT ID FROM customers WHERE User_ID=$userID";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data['User 1']['ID'];
    }
}