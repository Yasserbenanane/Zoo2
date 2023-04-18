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

    $query = "SELECT * FROM `personnels` WHERE `login` = :login";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':login', $login);
    $stmt->execute();

    $num_rows = $stmt->rowCount();

    echo $num_rows;

    if($num_rows == 0){

        $query = "INSERT INTO `personnels` (`nom`, `prenom`, `date_de_naissance`, `login`, `password`, `salaire`, `sexe`, `fonction`) VALUES (:firstName, :lastName, :birthdate, :login, :password, :salary, :sexe, :fonction )";

        echo $query;
        echo $lastName;
    
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':fonction', $fonction);
        $stmt->execute();


        if($stmt){
            header("location:index.php");
        }

    }else{
        header("location:index.php?FailedAdd=true");
    }
    
?>