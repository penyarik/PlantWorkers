<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Salary
 *
 * @author user76
 */
namespace app\components;
use vendor;
 

abstract class Salary extends vendor\Db{
 
   const COEF = 0.15;
     
    public function SalaryClaculateForEdit($department,$amount)
    {   
        $sql = "SELECT price FROM price WHERE id = $department";
        $res = $this->PDO->query($sql);
        $price = $res->fetch()['price'];
        
          
        $salary = $price*$amount*self::COEF;
        if($salary > 1500)
        {
            $salary = 1500;
        }
        return $salary;
        
        
    }
}
