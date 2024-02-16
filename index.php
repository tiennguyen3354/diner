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

// Define a default route
// route is a method of the Base class
$f3->route('GET /', function () {
//    echo "My Diner";

    //Display a views page
    $view = new Template();
    echo $view->render('views/info.html');
});

//reroute to breakfast page .
$f3->route('GET /breakfast', function () {
//    echo "My Diner";
    //Display a views page
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

//reroute to order1
$f3->route('GET /order-form-1', function () {
//    echo "My Diner";
    //Display a views page
    $view = new Template();
    echo $view->render('views/order-form-1.html');
});

//reroute to order2
$f3->route('GET /order-form-2', function ($f3) {
//    echo "My Diner";
    //Display a views page
    $view = new Template();
    echo $view->render('views/order-form-2.html');

    //echo "Order Form Part I";

    // If the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Validate the data
        $food = $_POST['food'];
        $meal = $_POST['meal'];

        // Put the data in the session array
        $f3->set('SESSION.food', $food);
        $f3->set('SESSION.meal', $meal);

        // Redirect to order2 route
        $f3->reroute('order2');
    }
});

// Run Fat-Free
$f3 ->run(); //Java will use "."
// example f3.run();