<?php

class Item {
    public $name = 'noName';
    public $description = 'This is the default';

    function __construct($name, $description) {
        $this->name = $name;
        $this->description = $description;
        echo 'new Item created with the Name: ' . $this->name . 'and the description: ' . $this->description;
    }

    function sayHello() {
        echo 'hello';
    }

    function getName() {
        return $this->name;
    }
}
