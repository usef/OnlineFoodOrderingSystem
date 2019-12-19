<?php
include_once '../DatabaseLayer/CategoryQueries.php';
include_once 'Item.php';

class Category
{
    public $categoryID;
    public $categoryName;
    private $listOfItems = array();
    private $categoryQueries;

    public function __construct()
    {
        $this->categoryQueries = new CategoryQueries();
        $this->listOfItems = new Item();
    }

    public function getCategories()
    {
        $result = $this->categoryQueries->getCategories();
        return $result;
    }

    public function updateCategory()
    {
        $result = $this->categoryQueries->updateCategory($this->categoryID, $this->categoryName);
        return $result;
    }

    public function addCategory()
    {
        $result = $this->categoryQueries->addCategory($this->categoryName);
        return $result;
    }

    public function deleteCategory()
    {
        $result = $this->categoryQueries->deleteCategory($this->categoryID);
        return $result;
    }
}