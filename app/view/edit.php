<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'layout/header.php';
?>
<div class = "form">
<form  method="POST">
  
  <p>
    Name
     <br>
    <input value ="<?php echo $name;?>" name="name">
  </p>
   
      <p>
    Amount of produced product
     <br>
    <input value ="<?php echo $amount_prod;?>" name="amount_prod"  >
  </p>
   
     
  <p>
    <label>Department</label>
     <br>
    <select name="department">
      
      <option value="2">Computers</option>
      <option value="1">Tvs</option>
      <option value="3">Mobile phones</option>
       
    </select>
  </p>
   
   <p>
       <input type="submit" name="button" value = "Send">
  </p>
</form>
 <?php if(isset($errors)):?>
   <?php foreach($errors as $elem):?>
        <p class = "message"> <?php echo $elem;?></p>
   <?php endforeach;?>
 <?php endif; ?>
</div>
     <?php

require_once 'layout/footer.php';
