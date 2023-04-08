<?php

    include '../bdd.php';

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthdate = $_POST['birthdate'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sexe = $_POST['gender'];
    $salary = $_POST['salary'];
    $fonction = $_POST['fonction'];

    $DBCheckPersonnalLogin = "SELECT * FROM `personnels` WHERE `login` = '$login'";

    $DBQueryCheckPersonnalLogin = mysqli_query($DBlink, $DBCheckPersonnalLogin);

    $num_rows = mysqli_num_rows($DBQueryCheckPersonnalLogin);

    echo $num_rows;

    if($num_rows == 0){

        $DBAddLogin = "INSERT INTO `personnels` (`nom`, `Prenom`, `date_de_naissance`, `login`, `password`, `salaire`, `sexe`, `fonction`) VALUES ('$firstName', '$lastName', '$birthdate', '$login', '$password', $salary, '$sexe', '$fonction');";
    
        $DBQueryAddLogin = mysqli_query($DBlink, $DBAddLogin);
    
        if($DBQueryAddLogin){
            header("location:index.php");
        }

    }else{
        header("location:index.php?FailedAdd=true");
    }
    
?>