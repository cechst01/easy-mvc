<?php

class Router{
    
            
    // instance controlleru, ktere se nasledne preda rizeni
    private $controller;
    
    // rozprasuje URL, zjisti nazev kontroleru, vytvori jej a preda mu rizeni
    public function processUrl(){
        $fullUrl = $this->getFullUrl();
        $parsedUrl = $this->getParsedUrl($fullUrl);
        $controllerName = array_shift($parsedUrl);
        $controllerClass = $this->getControllerClass($controllerName);       
        $this->setController($controllerClass);        
        $this->controller->process($parsedUrl);
        
    }
    
    private function getControllerClass($controllerName){
        // pokud neni zadan kontroler nebo je to index.php vrat home controller
        if(!$controllerName || $controllerName == 'index.php'){
           $controllerClass = HOME_CONTROLLER;
        }
        else{            
            $controllerClass = $this->getControllerClassName($controllerName);
        }
        return $controllerClass;
    }  
    
    //vrati jmeno tridy kontroleru podle jeji URL podoby
    private function getControllerClassName($controllerName){
       return $this->toCamelCase($controllerName) . CONTROLLER_POSTFIX;
    }
    
    // nastavi controller, podle jmena tridy, pokud ho nenajde nastavi error controller
    private function setController($controllerClass){
        
        if (!file_exists('controller/' . $controllerClass . '.php')){
            $controllerClass = ERROR_CONTROLLER;           
        }
        $this->controller = new $controllerClass;      
    }
    
    // vrati  pole s naparsovanou url
    private function getParsedUrl($fullUrl){       
       $url = trim(trim(str_replace(BASE_PATH,'',$fullUrl),'/'));
       return explode('/',$url);
    }
    
    //vrati plnou adresu requestu
    private function getFullUrl(){       
        $scheme = isset($_SERVER['https']) ? 'https://' :  'http://';
        return $scheme . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    } 
    // prevede pomlckove jmeno tridy pouzivane v URL na jeho camelCase podobu
    private function toCamelCase($controllerName){        
        $string = ucwords($controllerName, '-');
        return str_replace('-', '', $string);
    }
   
      
    
}