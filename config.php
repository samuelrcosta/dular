<?php
require 'environment.php';
$config = array();
if(ENVIRONMENT == 'development'){
    define("BASE_URL", 'http://localhost/php/dular');
    $config['dbname'] = 'dular';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
} else{
    define("BASE_URL", 'https://halfpet.com.br/dular');
    $config['dbname'] = 'ogopbuse_dular';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'ogopbuse_root';
    $config['dbpass'] = 'Costa_123';
}

global $MailHost;
global $MailPort;
global $MailUsername;
global $MailPassword;
global $MailName;
$MailHost = "smtp.gmail.com";
$MailPort = "465";
$MailUsername = "samu.rcosta@gmail.com";
$MailPassword = "samukinha";
$MailName = "Samuel Costa";




global $db;
try {
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'].";charset=utf8", $config['dbuser'], $config['dbpass']);
}catch (PDOExeption $e){
    echo "ERRO: ".$e->getMessage();
}