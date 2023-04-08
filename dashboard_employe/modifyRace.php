<?php

    include '../bdd.php';

    $idRace =$_POST['idRace'];

    $nameRace = $_POST['nameRace'];
    $lifeTime = $_POST['lifeTime'];
    $aquatic = $_POST['aquatic'];
    $foodType = $_POST['foodType'];

    
    $DBCheckRaceName = "SELECT * FROM `especes` WHERE `nom_race` = '$nameRace' AND `id` != '$idRace'";
    
    $DBQueryCheckRaceName = mysqli_query($DBlink, $DBCheckRaceName);
    
    $num_rows = mysqli_num_rows($DBQueryCheckRaceName);
    
    echo $num_rows;
    
    if($num_rows == 0){

        $DBAddRace = "UPDATE `especes` SET `nom_race` = '$nameRace', `duree_vie_moyenne` = '$lifeTime', `aquatique` = '$aquatic', `type_nourriture` = '$foodType' WHERE `especes`.`id` = $idRace;";
        
        echo $DBAddRace;
        $DBQueryAddRace = mysqli_query($DBlink, $DBAddRace);
    
        if($DBQueryAddRace){
            header("location:index.php");
        }
        
    }else{
        header("location:index.php?FailedAdd=true");
    }

?>