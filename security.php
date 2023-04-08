<?php

echo 'security ON';

if(!isset($_SESSION['login'])){
    header('location:index.php');
}


?>