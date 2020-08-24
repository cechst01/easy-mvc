<?php
// Controller ma na starosti prihlasovani a odhlasovani uzivatelu
class SignController extends Controller {
    
    public function process($params) {
        
        if($_POST){
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            if($this->signManager->authenticate($email, $password)){
               $this->setMessage('Přihlášení proběhlo úspěšně.');
               $this->redirect('administration');
            }
            else{
                $this->setMessage('Nesprávné přihlašovací údaje.');
                $this->redirect('home');
            }            
            
        }
        else{
            if($params[0] == 'out'){
                $this->logOut();
                $this->setMessage('Odhlášení proběhlo úspěšně');
                $this->redirect('home');
            }
        }
        
        
    }
}


