<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
     
namespace app\controllers;
 use app\model; 
 use app\components;
   
 
  
class WorkersController extends \app\components\Salary
{    
    public function ActionView()
    {   
        $view = new model\Workers();
       $workers = $view ->GetWorkers();
       $messages = $view->CheckWorkersCountByDepartment();
        
       if(!empty($_POST['name']))
       {
           $name = $_POST['name'];
          if($view->SearchByName($name) !== FALSE)
          { 
             $worker = $view->SearchByName($name);
              
          }
           if($view->SearchByName($name) == FALSE)
           {
              $_SESSION['message'] = ['text' => 'Not found', 'status' => 'error'];
               header('Location: /plant');
              
           }
          
       }
        
       
       require_once ROOT.'/app/view/view.php';
       
        return true;
    }
      public function ActionCreate()
    {
       
            $name = '';
            $department = '';
            $amount_prod = '';
        
        if(isset($_POST['button']))
        {   
            $name = $_POST['name'];
            $department = $_POST['department'];
            $amount_prod = $_POST['amount_prod'];
             
            
             
            $check = new \app\components\Check;
            if($check->CheckAmount($amount_prod) == true && $check->CheckName($name) == true  && $check->CheckDepartment($department) == true)
            {
                if($check->CheckWorkersCount($department) == true)
                {
                $salary = $this->SalaryClaculateForEdit($department, $amount_prod);
                 $edit = new model\Workers;
                 $res = $edit->Add($name, $department, $salary, $amount_prod);
                 
               
                 
                 $_SESSION['message'] = ['text'=>'A new worker has been added', 'status' => 'success'];
                 header('Location: /plant');
                 
                }
                 else{
                $errors = $check->errors;
               
            }
            }
            else
               {
                $errors = $check->errors;
               }
            
           
        }
        
        require_once ROOT.'/app/view/create.php';
        return true;
    }
      public function ActionEdit($worker_id)
    {
        
         
          
            $name = '';
    
            $department = '';
            $amount_prod = '';
        
        if(isset($_POST['button']))
        {   
            $name = $_POST['name'];
            $department = $_POST['department'];
            $amount_prod = $_POST['amount_prod'];
             
             
            $check = new \app\components\Check;
            if($check->CheckAmount($amount_prod) == true && $check->CheckName($name) == true  && $check->CheckDepartment($department) == true)
            {
                 
                 $salary = $this->SalaryClaculateForEdit($department, $amount_prod);
                 $edit = new model\Workers;
                 $res = $edit->Edit($name, $department, $salary, $amount_prod, $worker_id);
                
                 
                 $_SESSION['message'] = ['text' => 'Information has been edited', 'status'=>'success'];
                 header('Location: /plant');
                 
                
            }
            else{
                $errors = $check->errors;
                
            }
            
           
        }
        
        require_once ROOT.'/app/view/edit.php';
        return true;
    }
    public function ActionDelete($worker_id)
    {
        
        
           if(isset($_POST['button']))
           {
               
               if($_POST['delete'] == 1)
               {
                   
               $delete = new model\Workers;
               $res = $delete->Delete($worker_id);
                  $_SESSION['message'] = ['text' => 'Worker whith id = '.$worker_id.' is deleted', 'status' => 'success'];
                  header('Location: /plant');
               }
               else{
                    $_SESSION['message'] = ['text' => ' You refused to delete', 'status' => 'error'];
                    header('Location: /plant');
               }
           }
       
         require_once ROOT.'/app/view/delete.php';
         return true;
    }
    
}