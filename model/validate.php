<?php
/**
 * this is the validate class to validate the form
 * @ver 1.0
 * @Author Tien Nguyen

 */

class Validate
{
    // Return true if food is valid
    static function validFood($food)
    {
        return trim($food) != "";
    }

    static function validMeal($meal)
    {
        return in_array($meal, DataLayer::getMeals());
    }

}