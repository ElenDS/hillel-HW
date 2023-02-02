<?php

namespace App;

use App\myClasses\Money;
use Exception;

require_once '../autoloader.php';

$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('App\\', '../src');

$currencyDKK = new Money(20.5, 'DKK');
$currencyEUR = new Money(50, 'EUR');
echo $currencyDKK->equals($currencyEUR) . '<br>';
try{
    $currencyDKK->add($currencyEUR);
}
catch (Exception $e){
    echo $e->getMessage() . '<br>';
}
echo $currencyDKK->getAmount() . '<br>';

