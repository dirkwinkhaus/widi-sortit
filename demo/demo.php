<?php

use Widi\SortIt\Factory\SortManFactory;
use Widi\SortIt\MyObject;
use Widi\SortIt\MyType;
use Widi\SortIt\Option\Ascending;
use Widi\SortIt\Option\Descending;
use Widi\SortIt\SortCriteria;
use Widi\SortIt\SortMan;

require_once '../vendor/autoload.php';

$myTypeA = new MyType('A');
$myTypeB = new MyType('B');
$myTypeC = new MyType('C');

$arrayOfObjects = [
    new MyObject('1', 6, 'AA', $myTypeC),

    new MyObject('2', 5, 'BB', $myTypeB),
    new MyObject('3', 5, 'AB', $myTypeB),
    new MyObject('4', 5, 'AB', $myTypeA),


    new MyObject('5', 3, 'BA', $myTypeA),
    new MyObject('6', 2, 'CC', $myTypeB),
    new MyObject('7', 1, 'DD', $myTypeC),

];


$criteriaA = new SortCriteria(
    'value',
    new Ascending()
);

$criteriaB = new SortCriteria(
    'label',
    new Ascending()
);

$criteriaC = new SortCriteria(
    'type.name',
    new Ascending()
);

$sortManFactory = new SortManFactory();
$sortMan        = $sortManFactory->create();

$sortMan->registerCriteria($criteriaA);
$sortMan->registerCriteria($criteriaB);
$sortMan->registerCriteria($criteriaC);

$result = $sortMan->sort($arrayOfObjects);

/** @var MyObject $item */
foreach ($result as $item) {
    echo $item->getName() . ' ' . $item->getValue() . ' ' . $item->getLabel() . ' ' . $item->getType()->getName() . PHP_EOL;
}
