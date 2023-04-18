<?php

    session_start();

    if(!isset($_SESSION['login'])){
        if(!isset($_SESSION['fonction'])){
            header('location:../index.php');
        }
    }
    
    include '../bdd.php';
    header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1
    header("Pragma: no-cache"); // HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="module" src="main.js" defer></script>
    <title>DashBoard - Employée</title>
</head>
<body>

    <!-- LEFT NAV MENU -->



    <div class="boxLeft">
        <div class="partTop">
            <img src="../img/img_for_home/lion_logo.png" id="logoTigre">
            <h1>Zoo</h1>
        </div>
        <div class="barre"></div>
        <?php
        $OPENEDModify = false;
            if(isset($_GET['OPENEDModify'])){
                $OPENEDModify = $_GET['OPENEDModify'];
            }
        ?>
        <button id="DashboardBtn" class="btnNav <?php if(!$OPENEDModify){echo "active";}?>" data-nav="Dashbord"><img src="../img/img_for_dashbord_employe/pc.png" class="imgButton" data-nav="Dashbord">Dashboard</button>
        <button id="AddBtn" class="btnNav" data-nav="Ajouter"><img src="../img/img_for_dashbord_employe/plus.png" class="imgButton" data-nav="Ajouter">Ajouter</button>
        <button id="ModifyBtn" class="btnNav <?php if($OPENEDModify){echo "active";}?>" data-nav="Modifier"><img src="../img/img_for_dashbord_employe/crayon.png" class="imgButton" data-nav="Modifier">Modifier</button>
        <button id="SearchBtn" class="btnNav" data-nav="Rechercher"><img src="../img/img_for_dashbord_employe/loupe.png" class="imgButton" data-nav="Rechercher">Rechercher</button>
        <a href="../page_home/index.php">
            <button class="exit"><img src="../img/img_for_inscription/se-deconnecter.png" class="sortir"></button>
        </a>
        <div class="container-menu">
            <button id="btnBurger"><img src="../img/img_for_dashbord_employe/fleche-droite.png" class="fleche-menu"></button>
        </div>

        <?php

        if($OPENEDModify){

            echo '<script type="module" defer>
            import { showModify } from "./main.js";
    
    
            showModify()
            </script>';
        }
        if(isset($_GET['IdRace'])){
            echo '<script type="module" defer>
            import { showRace } from "./main.js";
    
    
            showRace()

            </script>';
        }
        if(isset($_GET['OPENEDSearch'])){
            echo '<script type="module" defer>
            import { showSearch } from "./main.js";
    
    
            showSearch();

            </script>';
        }
        if(isset($_GET['SearchRace'])){
            echo '<script type="module" defer>
            import { showSearchRace } from "./main.js";
    
    
            showSearchRace();
    
            </script>';
        }
        if(isset($_GET['FailedAdd'])){
            echo '<script defer>

            alert("Erreur : Nom déja existant.")
        

            </script>';;
        }
        ?>
    </div>

    <!-- RIGHT DASHBOARD MENU -->


    <div id="dashboardPage" class="show">
        <header>
            <p class="welcome">Salut <?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}?> 👋</p>
            <p class="employe">Employé</p>
        </header>
        <div class="main">
            <div class="containerLeft">
                <div class="yass">
                    <div class="containerimg">
                        <img src="../img/img_for_dashbord_employe/especes.png" class="imgcontainer">
                        <p class="titel">Espèces</p>
                    </div>
                </div>
                <p class="number">
                <?php 

                $query = "SELECT COUNT( * ) AS 'NbnRace' FROM especes";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                while($row = $stmt->fetch()){
                    echo $row['NbnRace'];
                }

                ?>
                </p>
            </div>
            <div class="containerRight">
                <div class="yass">
                    <div class="containerimg">
                        <img src="../img/img_for_dashbord_employe/animaux.png" class="imgcontainer">
                        <p class="titel">Animaux</p>
                    </div>
                </div>
                <p class="number"> 
                    <?php 

                    $query = "SELECT COUNT( * ) AS 'NbnAnimaux' FROM animaux";

                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    while($row = $stmt->fetch()){
                        echo $row['NbnAnimaux'];
                    }
                    
                    ?>
                </p>
                </div>
            <div class="partbottom">
                <h2 id="showTableTitleDashBoard">Liste des animaux</h2>
                <select class="menuDeroulant" id="dashboardSelectTable">
                    <option value="animaux">Animaux</option>
                    <option value="race">Race</option>
                </select>
                <div class="tableContainer show" id="tableContainerAnimauxDashBoard">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Date de naissance</th>
                                <th>Commentaire</th>
                                <th>Id espaces</th>
                                <th>Sexe</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                            $query = 'SELECT * FROM `animaux`';

                            $stmt = $pdo->prepare($query);
                            $stmt->execute();

                            while($row = $stmt->fetch())
                            {
                                ?>

                                <tr>
                                    <form action="deleteAnimaux.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["nom_animal"]; ?></td>
                                        <td><?php echo $row["date_de_naissance"]; ?></td>
                                        <td>
                                            <div class="commentContainerInTable">
                                                <p>
                                                <?php echo $row["commentaire"]; ?>
                                                </p>
                                            </div>
                                        </td>
                                        <td><?php echo $row["id_Especes"]; ?></td>
                                        <td><?php echo $row["sexe"]; ?></td>
                                        <td><button class="buttonSupp">
                                            <img src="../img/img_for_dashbord_employe/poubelle.png" class="supp">
                                        </button>
                                        </td>
                                    </form>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tableContainer" id="tableContainerRaceDashBoard">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Alimentation</th>
                                <th>Durée de vie</th>
                                <th>Aquatique</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            $query = 'SELECT * FROM `especes`';

                            $stmt = $pdo->prepare($query);
                            $stmt->execute();
                            

                            while($row = $stmt->fetch())
                            {
                                ?>
                                    <tr>
                                        <form action="deleteRace.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["nom_race"]; ?></td>
                                            <td><?php echo $row["type_nourriture"]; ?></td>
                                            <td><?php echo $row["duree_vie_moyenne"]; ?></td>
                                            <td>
                                                <?php 
                                                    if($row["aquatique"] == "0"){
                                                        echo "OUI";
                                                    }
                                                    else{
                                                        echo "NON";
                                                    }
                                                ?>
                                            </td>
                                            <td><button class="buttonSupp">
                                                <img src="../img/img_for_dashbord_employe/poubelle.png" class="supp">
                                            </button>
                                            </td>
                                        </form>
                                    </tr>
                                    <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>   
        </div>
    </div>


    <!-- RIGHT ADD MENU -->

    <div id="addPage">
        <header>
            <p class="welcome">Salut <?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}?> 👋</p>
            <p class="employe">Employé</p>
        </header>
        <div class="mainAdd">
            <form action="createAnimaux.php" method="post" autocomplete="off">
                
                <div class="select">
                    <select name="choixAnimal" class="choixAnimal" id="choixTypeAdd">
                        <option value="animal">Animal</option>
                        <option value="race">Especes</option>
                    </select>
                </div>
                
                <div class="pageAnimal show" id="pageAddAnimal">
                    <div class="grid-container">
                        <div class="grid-item">
                            <h2>Nom :</h2>
                            <input type="text" name="animalName" class="inputOne in" required>
                            <h2>Année de naissance :</h2>
                            <input type="text" name="birthdate" class="inputThree in" required>
                            </div>
                            <div class="grid-item">
                            <h2>Especes :</h2>
                            <?php 
                             include '../select/selectRaceComponent.php';
                             selectedRace();
                            ?>
                            <h2>Sexe :</h2>
                            <?php 
                             include '../select/selectGenderComponent.php';
                             selectedGender();
                            ?>
                        </div>
                    </div>
                    <div class="grid-item commentContainer">
                        <div>
                            <h3>Commentaire :</h3>
                            <textarea name="comment" class="inputFive" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="button">
                        <button class="ajouter">Ajouter</button>
                    </div>
                </div>
            </form>
            <form action="createRace.php" method="post" id="pageAddRace">
                <div class="pageRace">
                    <div class="grid-container">
                        <div class="grid-item">
                        <h2>Nom race :</h2>
                        <input type="text" name="nameRace" class="inputOne in" required>
                        <h2>Durée de vie :</h2>
                        <input type="text" name="lifeTime" class="inputThree in" required>
                        </div>
                        <div class="grid-item">
                        <h2>Alimentation :</h2>
                        <?php

                            include '../select/selectFoodTypeComponent.php';
                            selectedFoodType();

                        ?>
                        <h2>Aquatique :</h2>
                        <select name="aquatic" class="inputFour in" required>
                            <option value="0">OUI</option>
                            <option value="1">NON</option>
                        </select>
                        </div>
                    </div>
                    <div class="button">
                        <button class="ajouter">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- RIGHT MODIFY MENU -->

    <div id="modifyPage">
        <header>
            <p class="welcome">Salut <?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}?> 👋</p>
            <p class="employe">Employé</p>
        </header>
        <div class="mainAdd">
            <div>
                <div class="select">
                    <select name="choixAnimal" class="choixAnimal" id="choixTypeModify">
                        <option value="animal">Animal</option>
                        <option value="race">Especes</option>
                    </select>
                </div>
                <div class="pageAnimal show" id="pageModifyAnimal">
                    <div class="select">
                        <form action="showModifyAnimaux.php" method="post">
                            <?php
                                include '../select/selectAnimauxComponent.php';
                                if(isset($_GET['IdAnimaux'])){
                                    selectedAnimaux($_GET['IdAnimaux']);
                                }
                                else{
                                    selectedAnimaux();
                                }
                            ?>
                             <button class="ajouter">Choisir</button>
                        </form>
                    </div>
                    <form id="modifyAnimal" action="modifyAnimaux.php" method="post">
                        <?php
                        
                        if(isset($_SESSION['OPENEDModify'])){
                            include 'showModifyAnimaux.php';
                            unset($_SESSION['OPENEDModify']);
                            unset($_SESSION['IdAnimaux']);
                        }	

                        ?>
                    </form>
                </div>
            </div>
            <div id="pageModifyRace">
                <div class="pageRace">
                    <div class="select">
                        <form id="showRaceContainer" action="showModifyRace.php" method="post">
                            <?php 
                                 include '../select/selectRaceComponent.php';
                                 if(isset($_GET['IdRace'])){
                                    selectedRace($_GET['IdRace']);
                                }
                                else{
                                    selectedRace();
                                }
                            ?>
                            <button class="ajouter">Choisir</button>
                        </form>
                    </div>
                </div>
                <form id="modifyRace" action="modifyRace.php" method="post">
                        <?php
                        
                        if(isset($_SESSION['OPENEDModifyRace'])){
                            include 'showModifyRace.php';
                            unset($_SESSION['OPENEDModifyRace']);
                            unset($_SESSION['IdRace']);
                        }	
                        ?>
                </form>
            </div>
        </div>
    </div>


    <!--  SEARCH MENU -->

    <div id="searchPage">
        <header>
            <p class="welcome">Salut <?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}?> 👋</p>
            <p class="employe">Employé</p>
        </header>
        <div class="mainAdd">
            <div class="select">
                <select name="choixAnimal" id="choixTypeSearch" class="choixAnimal"> 
                    <option value="animal">Animal</option>
                    <option value="race">Especes</option>
                </select>
            </div>
            <form id="searchAnimauxContainer" class="searchContainer showflex" action="searchAnimaux.php" method="post">
                <div class="recherche">
                    <img src="../img/img_for_dashbord_employe/recherche.png" class="imgRecherche">
                    <input type="text" name="search" class="barreRecherche" placeholder="Rechercher" required>
                </div>
                <button class="ajouter">Rechercher</button>
                <div>
                    <?php
                    if(isset($_SESSION['OPENEDSearch'])){
                        include 'searchAnimaux.php';
                        unset($_SESSION['OPENEDSearch']);
                        unset($_SESSION['searchAnimal']);
                    }
                    ?>
                </div>
            </form>
            <form id="searchRaceContainer" class="searchContainer" action="searchRace.php" method="post">
                <div class="recherche">
                    <img src="../img/img_for_dashbord_employe/recherche.png" class="imgRecherche">
                    <input type="text" name="search" class="barreRecherche" placeholder="Rechercher" required>
                </div>
                <button class="ajouter">Rechercher</button>
                <div>
                    <?php
                    if(isset($_SESSION['showSearchRace'])){
                        include 'searchRace.php';
                        unset($_SESSION['showSearchRace']);
                        unset($_SESSION['searchRace']);
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>