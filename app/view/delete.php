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
 
    <label>Are realy want delete worker with id = <?php echo $worker_id;?>?</label>
     <br>
    <select name="delete">
      
      <option value="1">Yes</option>
      <option value="0">No</option>
     
       
    </select>
  </p>
   
   <p>
       <input type="submit" name="button" value = "Send">
  </p>
</form>
 
     <?php

require_once 'layout/footer.php';
