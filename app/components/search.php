<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_SESSION['worker']))
{
    $message = $_SESSION['worker'];
     
  
        echo '<p class = '.$message['status'].'>'.$message['text'].'</p>';
    
    unset($_SESSION['mesage']);
    session_destroy();
}