<?php
include_once 'UserQueries.php';

class CategoryQueries extends UserQueries
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories()
    {
        $query = "SELECT * FROM categories";
        $result = $this->db->query($query);
        $data = $this->db->resultAssoc($result);
        return $data;
    }

    public function updateCategory($id, $name)
    {
        $query = "UPDATE categories SET Name='$name' WHERE ID=$id";
        $result = $this->db->query($query);
        return $result;
    }

    public function addCategory($name){
        $query = "INSERT INTO categories VALUES (NULL,'$name')";
        $result = $this->db->query($query);
        return $result;
    }

    public function deleteCategory($id)
    {
        $query = "DELETE FROM categories WHERE ID=$id";
        $result = $this->db->query($query);
        return $result;
    }
}