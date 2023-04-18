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

    $query = "SELECT * FROM `personnels` WHERE `login` = :login";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':login', $login);
    $stmt->execute();

    $num_rows = $stmt->rowCount();

    echo $num_rows;

    if($num_rows == 0){
        $query = "INSERT INTO `personnels` (`nom`, `prenom`, `sexe`, `login`, `password`, `fonction`) VALUES (:nom, :prenom, :sexe, :login, :password, :fonction);";
    
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nom', $firstName);
        $stmt->bindParam(':prenom', $lastName);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':fonction', $fonction);
        $stmt->execute();
    
        if($stmt){
            echo "<h1> Compte crée </h1>";
            header("location:../index.php");
        }
        else{
            echo $query;
            echo "<h1> Error </h1>";
        }
    }else{
        header("location:index.php?FailedAdd=true");
    }
    
    ?>

    
</body>
</html>