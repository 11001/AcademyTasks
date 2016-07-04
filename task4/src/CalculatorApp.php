<?php

require_once '../vendor/autoload.php';

use App\Calculator;

use App\Operations\{Addition, Difference, Division, Module2, Multiply};

$calculator = new Calculator();

$calculator->addOperand(1);
$calculator->addOperand(12);
$calculator->addOperand(12);
$calculator->setOperation(new Addition());
echo $calculator->process(); // 25

$calculator->addOperand(12);
echo $calculator->process(); // 37

$calculator->setOperation(new Multiply());
$calculator->addOperand(2);
echo $calculator->process(); // 74

$calculator->setOperation(new Addition());
$calculator->addOperand(1);
echo $calculator->process(); // 75

$calculator->setOperation(new Division());
$calculator->addOperand(2);
echo $calculator->process(); // 37

$calculator->reset();
$calculator->addOperand(6);
$calculator->setOperation(new Module2());
echo $calculator->process(); // 64