<?php
/*
 * Tien Nguyen
 * January 2024
 * https://tiennguyen3354.greenriverdev.com/328/diner/
 * This is my CONTROLLER for the Diner application
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once ('vendor/autoload.php');

//Instantiate Fat Free Framework - F3
// Just like in JAVA you instantiate a class.
//Base is a class from the Fat Free Framework
$f3 = Base::instance(); //Object

// Define a default route
// route is a method of the Base class
$f3->route('GET /', function () {
//    echo "My Diner";

    //Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Run Fat-Free
$f3 ->run(); //Java will use "."
// example f3.run();