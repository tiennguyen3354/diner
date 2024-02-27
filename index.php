<?php
/*
 * Tien Nguyen
 * January 2024
 * https://tiennguyen3354.greenriverdev.com/328/diner/
 * This is my CONTROLLER for the Diner application
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

// Instantiate Fat Free Framework - F3
// Just like in JAVA you instantiate a class.
// Base is a class from the Fat Free Framework
$f3 = Base::instance(); //Object
$con = new Controller($f3);


// Define a default route
// route is a method of the Base class
$f3->route('GET /', function () {
    $GLOBALS['con']->home();
});

//reroute to breakfast page .
$f3->route('GET /breakfast', function () {
    $GLOBALS['con']->breakFast();
});

//reroute to order1
$f3->route('GET|POST /order-form-1', function () {
    $GLOBALS['con']->order1();
});

//reroute to order2
$f3->route('GET|POST /order-form-2', function ($f3) {
    $GLOBALS['con']->order2();
});

// Run Fat-Free
$f3 ->run(); //Java will use "."
// example f3.run();