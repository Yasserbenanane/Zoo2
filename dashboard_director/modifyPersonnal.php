<?php

include '../bdd.php';

    $id = $_POST['id'];

    $firstName = $_POST['nom'];
    $lastName = $_POST['prenom'];
    $birthdate = $_POST['date_de_naissance'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $salary = $_POST['salary'];
    $sexe = $_POST['gender'];

    
    $DBCheckPersonnalLogin = "SELECT * FROM `personnels` WHERE `login` = '$login' AND `id` != '$id'";
    
    $DBQueryCheckPersonnalLogin = mysqli_query($DBlink, $DBCheckPersonnalLogin);
    
    $num_rows = mysqli_num_rows($DBQueryCheckPersonnalLogin);
    
    echo $num_rows;
    
    if($num_rows == 0){

        $DBModifyPersonnal = "UPDATE `personnels` SET `nom` = '$firstName', `prenom` = '$lastName', `date_de_naissance` = '$birthdate', `login` = '$login', `password` = '$password', `salaire` = '$salary',  `sexe` = '$sexe' WHERE `personnels`.`id` = $id;";
        
    
        echo $DBModifyPersonnal;
        $DBQueryModifyPersonnal = mysqli_query($DBlink, $DBModifyPersonnal);
    
        if($DBQueryModifyPersonnal){
            header("location:index.php");
        }

    }else{
        header("location:index.php?FailedAdd=true");
    }


?>