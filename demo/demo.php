<?php

use Widi\SortIt\Factory\SortManFactory;
use Widi\SortIt\MyObject;
use Widi\SortIt\MyType;
use Widi\SortIt\Option\Ascending;
use Widi\SortIt\SortCriteria;
use Widi\SortIt\SortMan;

require_once '../vendor/autoload.php';

$myTypeA = new MyType('__type A');
$myTypeB = new MyType('__type B');
$myTypeC = new MyType('__type C');

$arrayOfObjects = [
    new MyObject(1, '__object A', $myTypeB),
    new MyObject(2, '__object DB', $myTypeB),
    new MyObject(2, '__object BA', $myTypeB),
    new MyObject(2, '__object FA', $myTypeB),
    new MyObject(2, '__object DA', $myTypeB),
    new MyObject(5, '__object C', $myTypeC),
    new MyObject(3, '__object B', $myTypeA),
];


$criteriaA = new SortCriteria(
    'value',
    new Ascending()
);

$criteriaB = new SortCriteria(
    'label',
    new Ascending()
);

$sortManFactory = new SortManFactory();
$sortMan        = $sortManFactory->create();

$sortMan->registerCriteria($criteriaA);
$sortMan->registerCriteria($criteriaB);

$result = $sortMan->sort($arrayOfObjects);

/** @var MyObject $item */
foreach ($result as $item) {
    echo $item->getLabel() . PHP_EOL;
}
