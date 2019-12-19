<?php


class Wallet
{
    private $balance;

    /**
     * Wallet constructor.
     */
    public function __construct()
    {
        $this->balance = 0;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    public function addToWallet($amount)
    {
        $this->balance += $amount;
    }

    public function pay($amount)
    {
        if ($amount > $this->balance) {
            die();
            return FALSE;
        } else {
            $this->balance -= $amount;
            return TRUE;
        }
    }

}