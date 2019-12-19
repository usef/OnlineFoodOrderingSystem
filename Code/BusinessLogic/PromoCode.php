<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/JetDelivery/DatabaseLayer/PromoCodeQueries.php';

class PromoCode
{
    public $code;
    public $value;
    public $activeDate;
    public $expiryDate;
    public $usesAllowed;
    public $status;
    private $promocodeQueries;

    /**
     * PromoCode constructor.
     * @param $promocodeQueries
     */
    public function __construct()
    {
        $this->promocodeQueries = new PromoCodeQueries();
    }


    public function addCode()
    {
        $result = $this->promocodeQueries->addCode($this->code,$this->value,$this->activeDate,$this->expiryDate,$this->usesAllowed,$this->status);
        return $result;
    }

    public function updateCode(){
        $result = $this->promocodeQueries->updateCode($this->code,$this->value,$this->activeDate,$this->expiryDate,$this->usesAllowed,$this->status);
        return $result;
    }

    public function deleteCode(){
        $result = $this->promocodeQueries->deleteCode($this->code);
        return $result;
    }

    public function getCodes()
    {
        $result = $this->promocodeQueries->getCodes();
        return $result;
    }

}