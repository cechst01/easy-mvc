<?php
// 
class SignManager {
    // overeni spravnosti uzivatelskych udaju
    public function authenticate($email,$password){
        
        $user = $this->getUserByEmail($email);
        if($user && password_verify($password, $user['password'])){
            $this->logIn($user['id']);
            return true;         
        }
        else{
            return false;
        }
    }
    
    private function logIn($id){
        $_SESSION['logged'] = $id;
        DB::update('user',['logged' => 1],'WHERE id = ?', [$id]);
    }
    
    public function getUserByEmail($email){
        return DB::queryOne('SELECT id,email, password FROM user WHERE email = ?',[$email]);
    }
    
    public function logOut(){
        $id = $_SESSION['logged'];
        unset($_SESSION['logged']);
        DB::update('user',['logged' => 0],'WHERE id = ?', [$id]);
    }
    
    public function isLoggedIn(){
        return isset($_SESSION['logged']);
    }
    
    
}