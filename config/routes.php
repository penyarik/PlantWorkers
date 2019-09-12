<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
     'PlantWorkers/workers/view/([a-z]+)' => 'workers/viewByName/$1',
     'PlantWorkers/workers/view' => 'workers/view',
     'PlantWorkers/workers/edit/([0-9]+)' => 'workers/edit/$1',
     'PlantWorkers/workers/delete/([0-9]+)' => 'workers/delete/$1',
     'PlantWorkers/workers/create' => 'workers/create',
     'PlantWorkers' => 'workers/view'
    );
