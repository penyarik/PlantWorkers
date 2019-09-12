<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
     'plant/workers/view/([a-z]+)' => 'workers/viewByName/$1',
     'plant/workers/view' => 'workers/view',
     'plant/workers/edit/([0-9]+)' => 'workers/edit/$1',
     'plant/workers/delete/([0-9]+)' => 'workers/delete/$1',
     'plant/workers/create' => 'workers/create',
     'plant' => 'workers/view'
    );