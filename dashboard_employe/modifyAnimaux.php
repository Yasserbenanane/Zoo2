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


    $DBCheckAnimauxName = "SELECT * FROM `animaux` WHERE `nom_animal` = '$nameAnimal' AND `id` != '$idAnimal'";

    $DBQueryCheckAnimauxName = mysqli_query($DBlink, $DBCheckAnimauxName);

    $num_rows = mysqli_num_rows($DBQueryCheckAnimauxName);

    echo $num_rows;

    if($num_rows == 0){
        $DBAddRace = "UPDATE `animaux` SET `nom_animal` = '$nameAnimal', `date_de_naissance` = '$birthdate', `commentaire` = '$comment', `id_Especes` = '$race', `sexe` = '$gender' WHERE `animaux`.`id` = $idAnimal;";
    
        echo $DBAddRace;
        $DBQueryAddRace = mysqli_query($DBlink, $DBAddRace);
    
        if($DBQueryAddRace){
            header("location:index.php");
        }
    }else{
        header("location:index.php?FailedAdd=true");
    }
?>