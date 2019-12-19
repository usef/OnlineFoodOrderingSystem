<?php
include_once 'UserQueries.php';

class PromoCodeQueries extends UserQueries
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCodes()
    {
        $query = "SELECT * FROM promocodes";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

    public function addCode($code,$value,$activeDate,$expiryDate,$usesAllowed,$status){
        $query = "INSERT INTO promocodes VALUES ('$code',$value,'$activeDate','$expiryDate',$usesAllowed,$status)";
        $result = $this->db->query($query);
        return $result;
    }

    public function deleteCode($code){
        $query = "DELETE FROM promocodes WHERE Code='$code'";
        $result = $this->db->query($query);
        return $result;
    }

    public function updateCode($code,$value,$activeDate,$expiryDate,$usesAllowed,$status){
        $query = "UPDATE promocodes SET Value=$value,Active_Date='$activeDate',Expiry_Date='$expiryDate',Uses_Allowed=$usesAllowed,Status=$status WHERE Code='$code'";
        $result = $this->db->query($query);
        return $result;
    }
}