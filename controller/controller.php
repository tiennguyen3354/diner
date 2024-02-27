<?php
/**
 * controller page
 *
 */
class Controller
{
    //field of controller
    private $_f3;

    //constructor
    function __construct($f3 )
    {
        $this->_f3 = $f3;
    }

    //routing to home page.
    function home ()
    {
        //    echo "My Diner";

        //Display a views page
        $view = new Template();
        echo $view->render('views/info.html');
    }
    function breakFast ()
    {

        //
        //get the data from the data-layer pag, set it in the f3 hive which can be access in the html page later.
        $this->_f3->set("breakfastItems" , DataLayer::getBreakfastMenu());
        //Display a views page
        $view = new Template();
        echo $view->render('views/breakfast.html');
    }
    function order1 ()
    {
        //2. If the route got to POST /
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // define the variable
            $food = "";
            $meal = "";


            //this will valid if the food is valid
            if(Validate::validFood($_POST['food']))
            {
                $food = $_POST['food'];
            }else {
                $this->_f3->set('error["food"]', "invalid food");
            }
            //validate the meal part
            if(isset($_POST['meal']) and Validate::validMeal($_POST['meal'])){
                $meal = $_POST['meal'];
            }else{
                $this->_f3->set('error["meal"]' , "invalid meal ");
            }

            //if there is no errors
            if(empty($this->_f3->get('error'))) {
                $order = new Order($food, $meal);
                $this->_f3->set('SESSION.order', $order);
//                var_dump($this->_f3->get('SESSION.order'));
                //if there are no error reroute somewhere NEED TO DO
                $this->_f3->reroute("order-form-2");

            }
        }

        //1. this will direct first time visit and will display this information first before going to post...
        //Display a views page if the route is GET/
        $this->_f3->set("meals" , DataLayer::getMeals());
        $view = new Template();
        echo $view->render('views/order-form-1.html');
    }

    function order2()
    {
        //part2 this will check to see if the method is POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //check if the condiments are valid
            if(isset($_POST['condiment'])) {
                $condimentString = implode("," , $_POST['condiment']);
                echo $condimentString;
            }else{
                $this->_f3->set('error["condiments]', "None of the condiment is selected. ");
            }

            //if there are no errors.
            if(empty($this->_f3->get('error'))){
                $this->_f3->get('SESSION.order')-> setCondiments($condimentString);
                $this->_f3->reroute('summary');
            }

        }

        //part 1 this will display the page if the method is GET
        //put the data into an array so you can access it at the html page
        $this->_f3->set("condiments" , DataLayer::getCondiments());
        // make the page visible
        $view = new Template();
        echo $view->render('views/order-form-2.html');
    }
}
