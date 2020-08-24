<?php
// Slouzi pro vypis vsech uzivatelu
class AdministrationController extends SecuredController {
    
    public function process($params) {
        parent::process($params);
        $userManager = new UserManager();
        $users = $userManager->getUsers();       
        $this->data['users'] = $users;
   
        $this->view = 'administration.php';
        $this->showView();        
    }
}

