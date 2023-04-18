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

    $nameRace = $_POST['nameRace'];
    $lifeTime = $_POST['lifeTime'];
    $foodType = $_POST['foodType'];
    $aquatic = $_POST['aquatic'];


    $query = "SELECT * FROM `especes` WHERE `nom_race` = :nameRace ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nameRace', $nameRace);
    $stmt->execute();

    $num_rows = $stmt->rowCount();

    echo $num_rows;

    if($num_rows == 0){
        $query = "INSERT INTO `especes` (`nom_race`, `duree_vie_moyenne`, `aquatique`, `type_nourriture`) VALUES (:nameRace, :lifeTime, :aquatic, :foodType)";
    
        echo $query;

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nameRace', $nameRace);
        $stmt->bindParam(':lifeTime', $lifeTime);
        $stmt->bindParam(':aquatic', $aquatic);
        $stmt->bindParam(':foodType', $foodType);
        $stmt->execute();
        
    
        if($stmt){
            header("location:index.php");
        }
    }
    else{
        header("location:index.php?FailedAdd=true");
    }


    ?>
</body>
</html>