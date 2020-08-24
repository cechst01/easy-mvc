<?php
// rozsiruje Controller o kontrolu prihlaseni pred zpracovanim
class SecuredController extends Controller {
    
    public function process($params) {
      if(!$this->isLoggedIn()){  
          $this->setMessage('Pro tuto akci musíte být přihlášen.');
          $this->redirect('home');
      }
    }
}

