<?php

abstract class Controller {
    // pole promenych ktere se budou predavat do sablony
    protected $data = [];
    // sablona ktera se vypise
    protected $view = "";
    // model pro kontrolu prihlaseni a odhlaseni
    protected $signManager;
    
    public function __construct(){
        $this->signManager = new SignManager();
    }
    
    // je volana routerem pro predani rizeni
    abstract function process($params);
     
    // zobrazeni sablony 
    public function showView(){
        if($this->view){
            extract($this->data);
            require('view/'.$this->view);
        }
    }
    
    public function redirect($url)    {
            $url = BASE_PATH . '/'.$url;
            header("Location: $url");
            header("Connection: close");
            exit;
    }
    // umoznuje controlleru zpracovavat ruzne akce, podle parametru v URL
    protected function callAction($params){        
        $action = array_shift($params);     
        if(is_callable([$this,$action])){
           $this->$action($params); 
        } 
        else{ 
            $this->redirect('error');
        }
    }
    
    protected function isLoggedIn(){
        return $this->signManager->isLoggedIn();
    }
    
    protected function logOut(){
        $this->signManager->logOut();
    }
    
    // nastaveni flash zpravy
    protected function setMessage($mesage){
        if(isset($_SESSION['messages'])){
            $_SESSION['messages'][] = $mesage;
        }
        else{
            $_SESSION['messages'] = [$mesage];
        }
    }

    // Vrátí pole flash zprav
    public static function getMessages(){
        if(isset($_SESSION['messages'])){
           $messages = $_SESSION['messages'];          
           unset($_SESSION['messages']); 
           return $messages;
        }
        else{
            return [];
        }        
    }
   
}
 