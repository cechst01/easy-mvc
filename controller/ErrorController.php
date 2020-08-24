<?php

class ErrorController extends Controller {
    
    public function process($params) {
        $this->view = 'error.php';
        $this->showView();
    }
}
