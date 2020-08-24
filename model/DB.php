<?php
// trida v modelech pro dotazovani nad DB
class DB{
    
   private static $connection;
   
   private static $setting = [
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
       PDO::ATTR_EMULATE_PREPARES => false
   ];
   
   // Pripojeni k DB - db server, db name, user, password
   public static function connect($host,$dbname,$user,$password){
       if (!isset(self::$connection))
        {
                self::$connection = new PDO(
                        "mysql:host=$host;dbname=$dbname",
                        $user,
                        $password,
                        self::$setting
                );
        }
   }
   // obecny dotaz na DB, ocekava dotaz a pole parametru
   public static function query($query,$params){
      $result = self::$connection->prepare($query);
      $result->execute($params);
      return $result->rowCount(); 
   }
   // dotaz vraci jeden radek z DB
   public static function queryOne($query,$params){
      $result = self::$connection->prepare($query);
      $result->execute($params);
      return $result->fetch(PDO::FETCH_ASSOC);     
   }
   // dotaz vraci vsechny vyhovujici radky
   public static function queryAll($query,$params){
      $result = self::$connection->prepare($query);
      $result->execute($params);
      return $result->fetchAll(PDO::FETCH_ASSOC);
   }
   // vlozeni do DB
   public static function insert($table,$params){       
       $columns = implode(', ', array_keys($params));
       $values = str_repeat('?, ',count($params)-1) . '?';
       $query = "INSERT INTO $table ($columns) VALUES($values)";
       
       return self::query($query, array_values($params));
   }
   // uprava radku v DB
   public static function update($table,$params,$cond,$condParams){
       $set = implode(' = ?, ', array_keys($params)) . ' = ?';
       $query = "UPDATE $table SET $set $cond";    
       
       return self::query($query, array_merge(array_values($params),$condParams));
   }
   
}


