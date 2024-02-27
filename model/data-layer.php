<?php
/**
 * this class is the class that contain the data layer for the app
 */

require($_SERVER['DOCUMENT_ROOT'].'/../config.php');
class DataLayer
{
    private $_dataBaseHandle;
    /**
     * DataLayer constructor
     *
     */
    function __construct()
    {
        try{
            //this will connect to the database from linking to the config.php file.
//           the DB_DSN, USERNAME, PASSWORD is set in the config.php
            $this->$dataBaseHandle = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD );
            echo 'connected to database';
        }
        catch (PDOException $e ){
//            if there is error, it will catch it here.
            echo  $e;
        }
    }

//    putting the data in an array
    static function getBreakfastMenu ()
    {
        return array("sausage" , "egg" , "ham");
    }
    static function getMeals ()
    {
        return array("breakfast" , "brunch" , "lunch", "diner");
    }
    static function getCondiments ()
    {
        return array("mustard" , "ketchup" , "Hot chilli sauce", "the best sauce there is");
    }
}