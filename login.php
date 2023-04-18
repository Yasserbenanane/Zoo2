<?php 
session_start();
include 'bdd.php';

$login = $_POST['login'];
$password = $_POST['password'];

$query = "SELECT * FROM `personnels` WHERE login = :login AND password = :password";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':password', $password);
$stmt->execute();


$result = $stmt->rowCount();


if($result == 1){
    $query = "SELECT `fonction` FROM `personnels` WHERE login = :login AND password = :password";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    while($row = $stmt->fetch()){
        $_SESSION['fonction'] = $row["fonction"];
    }
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    header('location:page_home/index.php');
}
else{
    $_SESSION['badconnecte'] = true;
    header('location:index.php');
}


?>