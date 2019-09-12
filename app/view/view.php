<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'layout/header.php';

$message = require_once ROOT.'/app/components/messages.php';
 

?>
<br></br>
<?php if(isset($messages)):?>
   <?php foreach($messages as $elem):?>
        <p><?php echo $elem;?></p>
   <?php endforeach;?>
 <?php endif; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>View</title>
  <style type="text/css">
   
  </style>
 </head>
 <body>
      
     <form method="POST">
         
         Enter name to search
         <br>
         <input type="search" name="name">
         
         <input type ="submit" value="Search">
     </form>
      
 <br></br>
 <?php if(isset($worker)):?>
 
 <table cellspacing="0">
      <tr> Found workers:</tr>
      <tr>
   <th>Name</th><th>Department</th><th>Amount of produced product</th><th>salary</th><th>Edit worker</th><th>Delete</th>
   </tr>
     
    <?php foreach ($worker as $elem)?>
    
   <tr>
    <td><?php echo $elem['name']?></td> <td><?php echo $elem['department_title']?></td><td><?php echo $elem['amount_prod']?></td><td><?php echo $elem['salary']?></td><td><a href = "/plant/workers/edit/<?php echo $elem['id']; ?>">Edit worker</a></td><td><a href = "/plant/workers/delete/<?php echo $elem['id']; ?>">Delete worker</a></td>
   </tr>
   <?php endif; ?>
 
      
    
  <table cellspacing="0">
        <br><br>  <br><br>
      <tr>Computer department:</tr>
      <tr>
    <th>#</th><th>Name</th><th>Department</th><th>Amount of produced product</th><th>salary</th><th>Edit worker</th><th>Delete</th>
    <?php $count = 1;?>
   <?php foreach ($workers as $elem):?>
   
   <?php if($elem['department_title'] == 'Computers'):?>
   <tr>
      <td><?php echo $count++; ?></td>  <td><?php echo $elem['name']?></td> <td><?php echo $elem['department_title']?></td><td><?php echo $elem['amount_prod']?></td><td><?php echo $elem['salary']?></td><td><a href = "/plant/workers/edit/<?php echo $elem['id']; ?>">Edit worker</a></td><td><a href = "/plant/workers/delete/<?php echo $elem['id']; ?>">Delete worker</a></td>
   </tr>
   <?php endif;?>
   <?php endforeach;?>
  </table>
     
     <br><br>
     <table cellspacing="0">
      <tr>TV department:</tr>
      <tr>
    <th>#</th><th>Name</th><th>Department</th><th>Amount of produced product</th><th>salary</th><th>Edit worker</th><th>Delete</th>
   </tr>
    <?php $count = 1;?>
   <?php foreach ($workers as $elem):?>
   <?php if($elem['department_title'] == 'TV sets'):?>
   <tr>
      <td><?php echo $count++; ?></td>  <td><?php echo $elem['name']?></td> <td><?php echo $elem['department_title']?></td><td><?php echo $elem['amount_prod']?></td><td><?php echo $elem['salary']?></td><td><a href = "/plant/workers/edit/<?php echo $elem['id']; ?>">Edit worker</a></td><td><a href = "/plant/workers/delete/<?php echo $elem['id']; ?>">Delete worker</a></td>
   </tr>
   <?php endif;?>
   <?php endforeach;?>
  </table>
     
 <br><br>
     <table cellspacing="0">
      <tr>Phones department:</tr>
      <tr>
    <th>#</th><th>Name</th><th>Department</th><th>Amount of produced product</th><th>salary</th><th>Edit worker</th><th>Delete worker</th>
   </tr>
    <?php $count = 1;?>
   <?php foreach ($workers as $elem):?>
   <?php if($elem['department_title'] == 'Mobile phones'):?>
   <tr>
     <td><?php echo $count++; ?></td>  <td><?php echo $elem['name']?></td> <td><?php echo $elem['department_title']?></td><td><?php echo $elem['amount_prod']?></td><td><?php echo $elem['salary']?></td><td><a href = "/plant/workers/edit/<?php echo $elem['id']; ?>">Edit worker</a></td><td><a href = "/plant/workers/delete/<?php echo $elem['id']; ?>">Delete worker</a></td>
   </tr>
   <?php endif;?>
   <?php endforeach;?>
  </table>
 <br></br> 
  
 
 
  
 
</body>
</html>
<?php
require_once 'layout/footer.php';
