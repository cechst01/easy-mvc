<?php
// ma na starosti akce pridani, upravu a mazani uzivatelu
class UserController extends SecuredController {
    
    // zpracuje parametry a zavola prislusnou akci
    public function process($params) {
        parent::process($params);
        $this->callAction($params);
    }
    
    // pridani noveho uzivatele
    public function add($params){
       $this->view = 'manageUser.php';
       $this->showView();
    }
    
    // editace uzivatelskeho uctu
    public function edit($params){        
       $id = array_shift($params);
       $userManager = new UserManager();
       $user = $userManager->getUserById($id);
       
       if(!$user){
           $this->redirect('error');
       }
       
       $this->data['user'] = $user;
       $this->view = 'manageUser.php';
       $this->showView();
    }
    
    // smazani uzivatele
    public function delete($params){
        try{
            $id = array_shift($params);
            $userManager = new UserManager();        
            $response = $userManager->deleteUser($id);

            header('Content-Type: application/json');
            echo json_encode($response);
        }
        catch(UserException $e){
            $message = $e->getMessage();
            
            header('Content-Type: application/json');
            echo json_encode($message);
        }         
    }
    
    // vola se pri odeslani formulare pro pridani/editaci uzivatele
    public function save(){
        try{
            if($_POST){
               $userManager = new UserManager();
               $userManager->saveUser($_POST);
               $this->setMessage('Údaje byly úspěšně uloženy');
               $this->redirect('administration');
            }        
        }
        catch(UserException $e){
            $this->setMessage($e->getMessage());
            $this->redirect('administration');
        }
    }
    
}

