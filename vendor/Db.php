<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Db
 *
 * @author user76
 */
namespace vendor;

abstract class Db {

    public $PDO;

    public function __construct() {
        $db = include ROOT.'/config/db.php';
         $this->PDO = new \PDO( $db['dsn'], $db['user'], $db['password']);

     }
}
