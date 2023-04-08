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


    $DBCheckRaceName = "SELECT * FROM `especes` WHERE `nom_race` = '$nameRace' ";

    $DBQueryCheckRaceName = mysqli_query($DBlink, $DBCheckRaceName);

    $num_rows = mysqli_num_rows($DBQueryCheckRaceName);

    echo $num_rows;

    if($num_rows == 0){
        $DBAddRace = "INSERT INTO `especes` (`nom_race`, `duree_vie_moyenne`, `aquatique`, `type_nourriture`) VALUES ('$nameRace', '$lifeTime', '$aquatic', '$foodType');";
    
        echo $DBAddRace;
        $DBQueryAddRace = mysqli_query($DBlink, $DBAddRace);
    
        if($DBQueryAddRace){
            header("location:index.php");
        }
    }
    else{
        header("location:index.php?FailedAdd=true");
    }


    ?>
</body>
</html>