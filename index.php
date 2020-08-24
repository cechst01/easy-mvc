<?php 
session_start();
include('config/config.php');
//Vytvoreni routeru, pro zpracovani URL.
$router = new Router();
// Pokud je pozadavek ajaxovy, zpracuj ho a ukonci script, jinak nacti i layout
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $router->processUrl();
    die();
}
include('view/layout.php');


