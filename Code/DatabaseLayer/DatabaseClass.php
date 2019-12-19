<?php


class DatabaseClass
{
    private $dbName = 'jetdelivery';
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbConnection;

    public function __construct()
    {
        $this->connect();
    }


    private function connect()
    {
        $this->dbConnection = mysqli_connect($this->host, $this->username, $this->password, $this->dbName);
        if (!$this->dbConnection) {
            die("Error connecting to database..");
        } else {
            return $this->dbConnection;
        }
    }

    public function query($query)
    {
        $result = mysqli_query($this->dbConnection, $query);
        return $result;
    }

    public function resultAssoc($result)
    {
        $data = array();

        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $counter++;
            $key = "User " . $counter;
            $data[$key] = $row;
        }

        return $data;
    }

    public function rowCount($result)
    {
        $count = mysqli_num_rows($result);
        return $count;
    }

    private function close()
    {
        if (!mysqli_close($this->dbConnection)) {
            die("Closing connection failed..");
        }
    }

}