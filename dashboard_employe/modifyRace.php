<?php

    include '../bdd.php';

    $idRace =$_POST['idRace'];

    $nameRace = $_POST['nameRace'];
    $lifeTime = $_POST['lifeTime'];
    $aquatic = $_POST['aquatic'];
    $foodType = $_POST['foodType'];

    
    $query = "SELECT * FROM `especes` WHERE `nom_race` = :nameRace AND `id` != :id";
    

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nameRace', $nameRace);
    $stmt->bindParam(':id', $idRace);
    $stmt->execute();
    
    $num_rows = $stmt->rowCount();
    
    echo $num_rows;
    
    if($num_rows == 0){

        $query = "UPDATE `especes` SET `nom_race` = :nameRace, `duree_vie_moyenne` = ':lifeTime', `aquatique` = ':aquatic', `type_nourriture` = ':foodType' WHERE `especes`.`id` = :idRace";
        
        echo $query;

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nameRace', $nameRace);
        $stmt->bindParam(':lifeTime', $lifeTime);
        $stmt->bindParam(':aquatic', $aquatic);
        $stmt->bindParam(':foodType', $foodType);
        $stmt->bindParam(':idRace', $idRace);
        $stmt->execute();
    
        if($stmt){
            header("location:index.php");
        }
        
    }else{
        header("location:index.php?FailedAdd=true");
    }

?>