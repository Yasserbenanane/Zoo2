<?php

    include '../bdd.php';

    $idAnimal = $_POST['idAnimal'];

    $nameAnimal = $_POST['nameAnimal'];
    $birthdate = $_POST['birthdate'];
    $comment = $_POST['comment'];
    $race = $_POST['race'];
    $aquatic = $_POST['aquatic'];
    $foodType = $_POST['foodType'];
    $gender = $_POST['gender'];


    $query = "SELECT * FROM `animaux` WHERE `nom_animal` = :nameAnimal AND `id` != :id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nameAnimal', $nameAnimal);
    $stmt->bindParam(':id', $idAnimal);
    $stmt->execute();
    
    $num_rows = $stmt->rowCount();

    if($num_rows == 0){
        $query = "UPDATE `animaux` SET `nom_animal` = :nameAnimal, `date_de_naissance` = :birthdate, `commentaire` = :comment, `id_Especes` = :race, `sexe` = :gender WHERE `animaux`.`id` = :id";
    
        echo $query;

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nameAnimal', $nameAnimal);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':race', $race);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':id', $idAnimal);
        $stmt->execute();
    
    
        if($stmt){
            header("location:index.php");
        }
    }else{
        header("location:index.php?FailedAdd=true");
    }
?>