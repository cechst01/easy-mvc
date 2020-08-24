<?php
// slouzi pro zobrazeni uvodni stranky
class HomeController extends Controller {
    
    public function process($params) {        
        $this->view = 'home.php'; 
        $this->showView();
    }
}
