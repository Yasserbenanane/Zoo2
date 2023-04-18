<?php

$dsn = 'mysql:host=localhost;dbname=ppe4';
$DBusername = 'root';
$DBpassword = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

try{
    $pdo = new PDO($dsn, $DBusername, $DBpassword, $options);
} catch(PDOException $e){
    die("Erreur de connexion : " . $e->getMessage());
}
?>