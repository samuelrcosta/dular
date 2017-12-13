<?php
require 'environment.php';
$config = array();
if(ENVIRONMENT == 'development'){
    define("BASE_URL", 'http://localhost/php/dular');
    define("SERVER_URL", '/php/dular/');
    $config['dbname'] = 'name_baseData';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
} else{
    define("BASE_URL", 'https://dularenxovais.com.br');
    define("SERVER_URL", '/');
    $config['dbname'] = 'name_baseData';
    $config['host'] = 'host.database.com.br';
    $config['dbuser'] = 'rootUser';
    $config['dbpass'] = 'root123';
}

global $MailHost;
global $MailPort;
global $MailUsername;
global $MailPassword;
global $MailName;
$MailHost = "host.mail.com";
$MailPort = "25";
$MailUsername = "mail@mail.com.br";
$MailPassword = "password";
$MailName = "Enxovais DuLar";

global $MAILCHIMP_API_KEY;
global $MAILCHIMP_LIST_ID;
$MAILCHIMP_API_KEY = 'MAIL_CHIMP_API_KEY';
$MAILCHIMP_LIST_ID = 'MAIL_CHIMP_LIST_ID';

global $db;
try {
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'].";charset=utf8", $config['dbuser'], $config['dbpass']);
}catch (PDOExeption $e){
    echo "ERRO: ".$e->getMessage();
}
