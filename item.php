<?php

class Item {
    public CONST MAX_LENGTH = 24;
    private $name = 'noName';
    private $description = 'This is the default';
    public static $count = 0;

    public function __construct($name, $description) {
        $this->name = $name;
        $this->description = $description;
        echo 'new Item created with the Name: ' . $this->name . ' and the description: ' . $this->description . ' ';
        static::$count++;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public static function showCount() {
        echo '<br>' . 'There are currently ' . static::$count. ' users registered ';
    }
    
}

class Product {
    public $name;
    protected $code = 1234;
    
    public function getProductDescription() {
        return '<br>'. 'The product listed is: ' . $this->name;
    }
}

class Book extends Product {
    public $author;

    public function getProductDescription() {
        return parent::getProductDescription() . ' The Autor is: ' . $this->author;
    }

    public function getCode(){
        return $this->code;
    }
    
}