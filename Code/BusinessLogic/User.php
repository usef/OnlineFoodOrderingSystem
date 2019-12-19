<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT'].'/JetDelivery/DatabaseLayer/UserQueries.php';

class User
{
    public $userID;
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    public $email;
    public $phoneNumber;
//    public $street;
//    public $city;
//    public $houseNo;
    public $balance;
    public $userTypeID;
    public $hash;
    public $active;
    private $userQueries;

    public function __construct()
    {
        $this->userQueries = new UserQueries();
    }

    public function login()
    {
        $data = $this->userQueries->login($this->username, $this->password);
        if (count($data) == 1) {
            $this->username = $data['User 1']['Username'];
            $this->password = $data['User 1']['Password'];
            $this->firstName = $data['User 1']['FName'];
            $this->lastName = $data['User 1']['LName'];
            $this->userID = $data['User 1']['User_ID'];
            $this->userTypeID = $data['User 1']['Type_ID'];
            $this->email = $data['User 1']['Email'];

            $balance = $this->userQueries->getBalance($this->userID);
            $this->balance = $balance;

            $_SESSION['Username'] = $this->username;
            $_SESSION['email'] = $this->email;
            $_SESSION['FName'] = $this->firstName;
            $_SESSION['LName'] = $this->lastName;
            $_SESSION['userTypeID'] = $this->userTypeID;
            $_SESSION['id'] = $this->userID;
            $_SESSION['balance'] = $this->balance;

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logout()
    {
        if (isset($_SESSION['Username'])) {
            session_destroy();
            return true;
        } else {
            return false;
        }
    }

    public function register()
    {
        $this->hash = md5(rand(0, 1000));
        $result = $this->userQueries->register($this->email, $this->username, $this->password, $this->firstName, $this->lastName, $this->phoneNumber, $this->hash);
        if ($result) {
            $this->sendMail();
            return $result;
        } else {
            return false;
        }
    }

    private function sendMail()
    {
        $to = $this->email; // Send email to our user
        $subject = 'Signup | Verification'; // Give the email a subject
        $message = '
             
            Thanks for signing up!
            Your account has been created, please activate your account by pressing the url below.
             
            ------------------------
            Username: ' . $this->username . '
            ------------------------
             
            Please click this link to activate your account:
            http://localhost/JetDelivery/UI/verify.php?email=' . $this->email . '&hash=' . $this->hash . '
            ';

        $headers = 'From:noreply@jetdelivery.com' . "\r\n"; // Set from headers
        //mail($to, $subject, $message, $headers); // Send our email
    }

//    sendMail() is not currently working

    public function verifyUser()
    {
        $result = $this->userQueries->verifyUser($this->email, $this->hash);
        return $result;
    }

    public function updateProfile()
    {
        $result = $this->userQueries->updateProfile($this->userID, $this->username, $this->password, $this->firstName, $this->lastName,$this->userTypeID,$this->active);
        return $result;
    }

    public function getUserPassword()
    {
        $data = $this->userQueries->getUser($this->userID);
        if ($data) {
            return $this->password = $data['User 1']['Password'];
        } else {
            return false;
        }
    }

    public function getUser($id)
    {
        $result = $this->userQueries->getUser($id);
        return $result;
    }

    public function deleteUser()
    {
        $result = $this->userQueries->deleteUser($this->userID);
        return $result;
    }

    public function getAllUsers()
    {
        $result = $this->userQueries->getAllUsers();
        return $result;
    }

    public function getUserTypes()
    {
        $result = $this->userQueries->getUserTypes();
        return $result;
    }

    public function getUsersByType($typeid)
    {
        $result = $this->userQueries->getUsersByType($typeid);
        return $result;
    }

    public function addUser(){
        $result = $this->userQueries->addUser($this->username,$this->email,$this->password,$this->firstName,$this->lastName,$this->userTypeID,$this->active);
        return $result;
    }

//    public function search()
//    {
//
//    }

    public function getUserPermissions(){
        $result = $this->userQueries->getUserPermissions($this->userTypeID);
        return $result;
    }

}