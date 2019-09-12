<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Edit
 *
 * @author user76
 */
namespace app\components;
use app\model;


class Check {
     public $errors = [];
      
     public function CheckWorkersCount($department)
     {
         
         $pdo = new model\Workers;
        
         $db = $pdo->PDO;
         $sql = "SELECT COUNT(*) as count FROM workers WHERE department = '$department'";
         $res = $db->query($sql);
         $count = $res->fetch()['count'];
         if($count > 9)
         {
             $this->errors['count'] = "In this department is 10 workers. You can't add more";
             
             return false;
         }
         else{
              
             return true;
             
         }
         
     }
     public function CheckAmount($amount_prod)
     {
       if(preg_match("~^[1-9][0-9]*$~", $amount_prod) !== 1)
        {
          $this->errors['amount_type'] = "Enter correct amount. It should be a nubmer";   
          return false;
        }  
        return true;
     }
     public function CheckName($name)
     {
       if(preg_match("~[A-Za-z]+~", $name) !== 1)
        {
          $this->errors['name_type'] = "Enter correct name ";   
          return false;
        } 
        return true;
     }
     public function CheckDepartment($department)
     {
       if(empty($department))
        {
          $this->errors['department'] = "Enter department";   
          return false;
        } 
        return true;
     }
}
