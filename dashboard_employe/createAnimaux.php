<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php

    include '../bdd.php';

    $animalName = $_POST['animalName'];
    $race = $_POST['race'];
    $birthdate = $_POST['birthdate'];
    $sexe = $_POST['gender'];
    $comment = $_POST['comment'];


    $query = "SELECT * FROM `animaux` WHERE `nom_animal` = :animalName ";

   
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':animalName', $animalName);
    $stmt->execute();

    $num_rows = $stmt->rowCount();

    echo $num_rows;

    if($num_rows == 0){
        $query = "INSERT INTO `animaux` (`nom_animal`, `id_Especes`, `date_de_naissance`, `sexe`, `commentaire`) VALUES (:animalName, :race, :birthdate, :sexe, :comment);";
    
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':animalName', $animalName);
        $stmt->bindParam(':race', $race);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':comment', $comment);
        $stmt->execute();
    
        if($stmt){
            header("location:index.php");
        }
    }else{
        header("location:index.php?FailedAdd=true");
    }

    ?>
</body>
</html>