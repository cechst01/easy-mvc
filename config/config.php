<?php

//postfix pouzivany u controlleru
define ('CONTROLLER_POSTFIX', 'Controller'); 
// vychozi controller
define ('HOME_CONTROLLER','HomeController');
// controller pro zpracovani chyb
define ('ERROR_CONTROLLER','ErrorController');

 function autoload($class)
{
    // Pokud konci nazev tridy na Controller, vloz controller jinak model
    $pattern = '/'. CONTROLLER_POSTFIX .'$/';
    if (preg_match($pattern, $class)){
        require("controller/" . $class . ".php");
    }
    else{
        require("model/" . $class . ".php");
    }
}
    
spl_autoload_register("autoload");

//definice url projektu
define('BASE_PATH','http://localhost/users-administration');

// pripojeni k DB - db server, db name, user, password
DB::connect('localhost', 'pro', 'root', '');


