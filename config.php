<?php
require 'environment.php';
$config = array();
if(ENVIRONMENT == 'development') {
    define("BASE_URL", "http://localhost/learning/");
    $config['dbname'] = 'learning';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';

 }
 else if (ENVIRONMENT == 'development2') {
    define("BASE_URL", "http://localhost:3000/learning/");
    $config['dbname'] = 'learning';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'jorge';
    $config['dbpass'] = '';
 }
else {
    define("BASE_URL", "http://meusite.com/");
    $config['dbname'] = 'estrutura_mvc';
    $config['host'] = 'producao';
    $config['dbuser'] = 'teste';
    $config['dbpass'] = 'teste';
}

try {
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],
            $config['dbuser'], $config['dbpass']);
} catch(PDOException $ex) {
    echo "ERRO: ".$ex->getMessage();
}