<?php
    session_start();

	include '../bdd.php';

?>    

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
    <title>Document</title>
</head>
<body>
    <?php

    if(isset($_GET['FailedAdd'])){
        echo '<script defer>

        alert("Erreur : Login déja existant.")


        </script>';
    }
    ?>
    <main>
        <div id="part_left">
            <h2 class="titel">Zoo</h2>
            <h2 id="zooTitle">Employé</h2>
            <div class="img">
                <img src="../img/img_for_inscription/emplo.png" class="employé" id="leftSideImage">
            </div>
            <a href="../index.php">
                <button class="logo"><img src="../img/img_for_inscription/se-deconnecter.png" class="exit"></button>
            </a>
        </div>
        <form action="createAccount.php" method="post">
            <div id="part_right">
                <h1>Inscription</h1>
                <select id="menuFonction" name="fonction">
                    <option value="Employé">Employé</option>
                    <option value="Directeur">Patron</option>
                </select>
                <div class="input">
                    <input type="text" class="name" name="firstName" placeholder="Nom" required>
                    <input type="text" class="prenom" name="lastName" placeholder="Prenom" required>
                </div>
                <?php 
                
                include '../select/selectGenderComponent.php';
                selectedGender();
                ?>
                <input type="text" class="login" name="login" placeholder="Login" required> 
                <div class="part_bottom">
                    <input type="password" class="password" name="password" placeholder="Password" required> 
                    <div class="password_securise">
                        <p>Mot de passe sécurisé</p>
                        <ul>
                            <li>5-18 characteres</li>
                            <li>Majuscule</li>
                            <li>Nombre</li>
                            <li>Pas d'espace</li>
                        </ul>
                    </div>
                    <button id="save">Enregistrer</button>
                </div>
            </div>
        </form>
</main>
</body>
</html>