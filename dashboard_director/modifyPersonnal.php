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

    
    $query = "SELECT * FROM `personnels` WHERE `login` = :login AND `id` != :id";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    
    $num_rows = $stmt->rowCount();
    
    echo $num_rows;
    
    if($num_rows == 0){

        $query = "UPDATE `personnels` SET `nom` = :firstName, `prenom` = :lastName, `date_de_naissance` = :birthdate, `login` = :login, `password` = :password, `salaire` = :salary,  `sexe` = :sexe WHERE `personnels`.`id` = :id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
    
        echo $query;
    
        if($stmt){
            header("location:index.php");
        }

    }else{
        header("location:index.php?FailedAdd=true");
    }


?>