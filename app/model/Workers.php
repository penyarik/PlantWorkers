<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Workers
 *
 * @author user76
 */
namespace app\model;
use vendor;
 
class Workers extends vendor\Db{
    
    public $message = [];
    
    public function GetWorkers()
     {         
         $sql =  "SELECT *, departments.title as department_title
FROM workers LEFT JOIN departments ON departments.depart_id = workers.department ORDER BY amount_prod";
          
  
          
          
         $res = $this->PDO->query($sql);
          for($date = []; $row = $res->fetch(\PDO::FETCH_ASSOC); $date[] = $row);
         
         return $date;
 
     }
     
     private function GetDepartmentName($dep_id) 
     {
        $sql = "SELECT title FROM departments WHERE depart_id='$dep_id'";
         $res = $this->PDO->query($sql);
         return $res->fetch()['title'];
         
     }
     
     public function CheckWorkersCountByDepartment()
     {
         for($i = 1; $i <= 3; $i++)
         {
         $sql = "SELECT COUNT(*) as count FROM workers WHERE department = '$i'";
         $res = $this->PDO->query($sql);
         $count = $res->fetch()['count'];
             if($count < 10)
             {
                  
             $num = 10-$count;
             $depart = $this->GetDepartmentName($i);
             $this->message[] = 'You need to add '.$num.' employees to the department:'.$depart.'';
             }
         
         }
         return $this->message;
     }
     
     public function Edit($name,$department,$salary,$amount_prod,$worker_id)
     {
         $sql = "UPDATE workers
              SET name = '$name', department = '$department', amount_prod = '$amount_prod', salary = '$salary'
              WHERE id = $worker_id";
         $res = $this->PDO->prepare($sql);
         $result = $res->execute();
         if($result)
         {   
             return true;
         }
     }
     public function Add($name,$department,$salary,$amount_prod)
     {
         $sql = "INSERT INTO workers
              SET name = '$name', department = '$department', amount_prod = '$amount_prod', salary = '$salary'
               ";
         $res = $this->PDO->prepare($sql);
         $result = $res->execute();
         if($result)
         {    
             return true;
         }
     }
     public function SearchByName($name)
     {
         $sql = " SELECT *, departments.title as department_title
FROM workers LEFT JOIN departments ON departments.depart_id=workers.department WHERE name = '$name'";
         $res = $this->PDO->query($sql);
         
         if(isset($res))
         {
                for($date = []; $row = $res->fetch(\PDO::FETCH_ASSOC); $date[] = $row);
               if(!empty($date))
               {
                   return $date;
               }
         }
         else{
             return FALSE;
         }
     }
     public function Delete($id)
     {
         $sql = "DELETE FROM workers WHERE id='$id'";
         $res = $this->PDO->prepare($sql);
         $result = $res->execute();
         if($result)
         {
             return true;
         }
         else{
             return false;
         }
     }
}
