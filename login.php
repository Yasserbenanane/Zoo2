<?php 
session_start();
include 'bdd.php';

$login = $_POST['login'];
$password = $_POST['password'];

$BDSearchLoginPassword = "SELECT * FROM `personnels` WHERE login = '$login' AND password = '$password'";
$DBQueryIdPersonnal = mysqli_query($DBlink, $BDSearchLoginPassword);

$result = (string)mysqli_affected_rows($DBlink);


if($result == "1"){
    $BDSearchFonction = "SELECT `fonction` FROM `personnels` WHERE login = '$login' AND password = '$password'";
    $DBQueryFonction = mysqli_query($DBlink, $BDSearchFonction);
    while($row = mysqli_fetch_assoc($DBQueryFonction)){
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