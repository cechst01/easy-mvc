<?php
// ma na starosti registraci, editaci a mazani uzivatelu
 class UserManager{
     
    // vrati uzivatele dle ID
     public function getUserById($id){
         $query = "SELECT id, first_name, last_name, city, email, street, postal_code".
                 " FROM user WHERE id = ?";
         return DB::queryOne($query, [$id]);
     }
     
     //vrati vsechny uzivatele
     public function getUsers(){
         $query = "SELECT id, first_name, last_name, city, email, street, postal_code".
                 " FROM user ORDER BY last_name, first_name";
         return DB::queryAll($query, []);
     }
     
     // ulozi data s formulare
     public function saveUser($dataArray){
         if(empty($dataArray['id'])){
            return $this->registerUser($dataArray);
         }
         else{           
           return $this->updateUser($dataArray);
         }
     }
     
     // registrace noveho uzivatele
     private function registerUser($dataArray){
         
         $this->isAllInput($dataArray);         
         $this->isEmailFree($dataArray['email']);
         $this->isSamePassword($dataArray['password'], $dataArray['again']);         
        
         unset($dataArray['id'],$dataArray['again']);
         $dataArray['password'] = password_hash($dataArray['password'], PASSWORD_BCRYPT);
         return DB::insert('user', $dataArray);
     }
     
     // uprava existujiciho uzivatele
     private function updateUser($dataArray){
         
         $dataArray = $this->removeEmptyItems($dataArray);
        
         $id = $dataArray['id'];
         $user = $this->getUserById($id);
         
         if($user['email'] != $dataArray['email']){
             $this->isEmailFree($dataArray['email']);
         }         
                 
         if(isset($dataArray['password'])){
             $this->isSamePassword($dataArray['password'], $dataArray['again']);
             $dataArray['password'] = password_hash($dataArray['password'], PASSWORD_BCRYPT);         }
        
         unset($dataArray['id'],$dataArray['again']);
         return DB::update('user', $dataArray,'WHERE id = ?',[$id]);
     }
     
     // overeni volneho emailu
     private function isEmailFree($email){                
         
         if( 0 !=  DB::query('SELECT id FROM user WHERE email = ?',[$email])){
             
             throw new UserException('Zadaný email je již obsazen');
             
         }      
     }
     
     // overeni jestli se hesla shoduji
     private function isSamePassword($password,$again){
         if($password != $again){
             throw new UserException('Zadaná hesla se neshodují');
         }
     }
     
     // overeni jestli jsou vyplnene vsechny udaje
     private function isAllInput($dataArray){
         unset($dataArray['id']);
         foreach ($dataArray as $item){
             if(empty($item)){
                 throw new UserException('Všechny položky musí být vyplněny');
             }
         }
     }
     
     // odstrani z dat prazdne pole pri editaci udaju
     private function removeEmptyItems($array){
         return array_filter($array,function($item){
             return !empty($item);
         });
     }
     
     // vymaze uzivatele
     public function deleteUser($id){
         $logged = DB::queryOne('SELECT logged FROM user WHERE id = ?',[$id])['logged'];
         if($logged){
             throw new UserException('Uživatel je přihlášený, nemůže být smazán.');
         }    
         return DB::query('DELETE FROM user WHERE id = ?', [$id]);
     }
 }

