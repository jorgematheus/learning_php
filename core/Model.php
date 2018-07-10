<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 04/07/2018
 * Time: 17:04
 */

class Model {
    protected $db;
    public function __construct() {
        global $config;
        $this->db = new PDO('mysql:dbname='.$config['dbname'].';host='.$config['host'], $config['dbuser'], $config['dbpass']);
    }
}