<?php require 'item.php';

//$my_item = new Item();

//$my_item->name = 'Example';

//var_dump($my_item->name);

// $item2 = new Item();
// $item2->price = 2.55;
// $item2->name = 'Frank';

// var_dump($item2);

// $item2->sayHello();

// echo $item2->getName();

// $item3 = new Item();
// $item3->name = 'Peter';

// echo $item3->getName(); 

// $item4 = new Item();


$item5 = new Item('Suzanne', 'Nurse');

var_dump($item5->getName());

$item5->setName('Sue');

var_dump($item5->getName());

$item6 = new Item('Peter', 'Lecturer');

Item::showCount();

define('MAXIMUM', '100');
define('COLOUR', 'red');

echo MAXIMUM;

echo Item::MAX_LENGTH;

$newproduct = new Product();
$newproduct->name = 'TV';

echo $newproduct->getProductDescription();

$newbook = new Book();
$newbook->name = 'Bio';
$newbook->author = 'Peter Tiernan';
echo $newbook->getProductDescription();
echo $newbook->getCode();