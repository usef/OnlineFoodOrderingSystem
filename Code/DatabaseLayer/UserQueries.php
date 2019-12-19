<?php


include_once 'DatabaseClass.php';

class UserQueries
{
    protected $db;

    public function __construct()
    {
        $this->db = new DatabaseClass();
    }

    public function getUser($id)
    {
        $query = "SELECT * FROM users WHERE User_ID=$id";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

    public function getAllUsers()
    {
        $query = "SELECT u.User_ID,u.Email,u.Username,u.FName,u.LName,u.Type_ID,ut.Name as usertype,u.Active FROM users u JOIN users_types ut ON u.Type_ID = ut.ID";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

    public function getUsersByType($typeid)
    {
        $query = "SELECT u.User_ID,u.Email,u.Username,u.FName,u.LName,u.Type_ID,ut.Name as usertype,u.Active FROM users u JOIN users_types ut ON u.Type_ID = ut.ID WHERE u.Type_ID = $typeid";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

    public function login($username, $password)
    {
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND active = 1";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

    public function getUserPermissions($userTypeId){
        $query = "SELECT Name,URL FROM links l JOIN userlinks ul ON l.ID=ul.Link_ID WHERE ul.Type_ID=$userTypeId";
        $result= $this->db->query($query);
        $data= $this->db->resultAssoc($result);
        return $data;
    }

    public function register($email, $username, $password, $fname, $lname, $phone, $hash)
    {
        $query = "INSERT INTO users VALUES (NULL,2,'$email','$username','$password','$fname','$lname','$hash',0)";
        $result = $this->db->query($query);
        if ($result) { // if insert to users successful then insert phone number below
            $id = $this->getUserID($username);
            $query = "INSERT INTO phone_numbers VALUES ('$id','$phone')";
            $result = $this->db->query($query);
            return $result;
        } else {
            return false;
        }
    }

    public function getUserID($username)
    {
        $query = "SELECT User_ID FROM users WHERE username = '$username'";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data['User 1']['User_ID'];
    }

    public function verifyUser($email, $hash)
    {
        $query = "SELECT Email, Hash, Active FROM users WHERE Email = '$email' AND Hash = '$hash' AND Active = 0";
        $result = $this->db->query($query);
        if ($this->db->rowCount($result) == 1) {
            return $this->activateAccount($email, $hash);
        } else {
            return false;
        }
    }

    public function activateAccount($email, $hash)
    {
        $query = "UPDATE users SET Active = 1 WHERE Email = '$email' AND Hash = '$hash' AND Active = 0";
        $result = $this->db->query($query);
        return $result;
    }

    public function getBalance($id)
    {
        $query = "SELECT Balance FROM customers WHERE User_ID = $id";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data['User 1']['Balance'];
    }

    public function updateProfile($id, $username, $password, $fname, $lname,$usertypeID,$active)
    {
        $query = "UPDATE users SET Username = '$username', Password = '$password', FName = '$fname', LName = '$lname', Type_ID=$usertypeID, Active=$active WHERE User_ID = $id";
        $result = $this->db->query($query);
        return $result;
    }

    public function addUser($username,$email, $password, $fname, $lname,$usertypeID,$active){
        $query = "INSERT INTO users VALUES (NULL,$usertypeID,'$email','$username','$password','$fname','$lname','',$active)";
        $result = $this->db->query($query);
        return $result;
    }

    public function deleteUser($userId)
    {
        $query = "DELETE FROM users WHERE User_ID=$userId";
        $result = $this->db->query($query);
        return $result;
    }

    public function getUserTypes()
    {
        $query = "SELECT * FROM users_types";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }
}
