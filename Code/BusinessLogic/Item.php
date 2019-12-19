<?php
include_once '../DatabaseLayer/ItemQueries.php';

class Item
{
    public $itemID;
    public $name;
    public $price;
    public $quantity;
    public $description;
    public $itemImage;
    public $categoryID;
    public $restaurantID;
    public $active;
    private $itemQueries;

    public function __construct()
    {
        $this->itemQueries = new ItemQueries();
    }

    public function getItems()
    {
        $result = $this->itemQueries->getItems();
        return $result;
    }

    public function updateItem()
    {
        $result = $this->itemQueries->updateItem($this->itemID,$this->name,$this->price,$this->quantity,$this->description,$this->categoryID,$this->restaurantID,$this->active,$this->itemImage);
        return $result;
    }

    public function addItem()
    {
        $result = $this->itemQueries->addItem($this->name,$this->price,$this->quantity,$this->description,$this->categoryID,$this->restaurantID,$this->active,$this->itemImage);
        return $result;
    }

    public function deleteItem()
    {
        $result = $this->itemQueries->deleteItem($this->itemID);
        return $result;
    }

    public function getRestaurantItems()
    {
        $result = $this->itemQueries->getRestaurantItems($this->restaurantID);
        return $result;
    }

    public function getItem(){
        $result = $this->itemQueries->getItem($this->itemID);
        return $result;
    }

}