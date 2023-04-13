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

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $sexe = $_POST['gender'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $fonction = $_POST['fonction'];

    $DBCheckPersonnalLogin = "SELECT * FROM `personnels` WHERE `login` = '$login'";

    $DBQueryCheckPersonnalLogin = mysqli_query($DBlink, $DBCheckPersonnalLogin);

    $num_rows = mysqli_num_rows($DBQueryCheckPersonnalLogin);

    echo $num_rows;

    if($num_rows == 0){
        $DBAddLogin = "INSERT INTO `personnels` (`nom`, `prenom`, `sexe`, `login`, `password`, `fonction`) VALUES ('$firstName', '$lastName', '$sexe', '$login', '$password', '$fonction');";
    
        $DBQueryAddLogin = mysqli_query($DBlink, $DBAddLogin);
    
        if($DBQueryAddLogin){
            echo "<h1> Compte crée </h1>";
            header("location:../index.php");
        }
        else{
            echo $DBAddLogin;
            echo "<h1> Error </h1>";
        }
    }else{
        header("location:index.php?FailedAdd=true");
    }
    
    ?>

    
</body>
</html>