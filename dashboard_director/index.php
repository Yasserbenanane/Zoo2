<?php

    session_start();

    if(!isset($_SESSION['fonction'])){
        header('location:../index.php');    
    }

    if(isset($_SESSION['fonction'])){
        if($_SESSION['fonction'] != "Directeur"){
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
    <title>Document</title>
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
        <button class="btnNav active" data-nav="Dashbord"><img src="../img/img_for_dashbord_employe/pc.png" class="imgButton" data-nav="Dashbord">Dashbord</button>
        <button class="btnNav" data-nav="Ajouter"><img src="../img/img_for_dashbord_employe/plus.png" class="imgButton" data-nav="Ajouter">Ajouter</button>
        <button id="ModifyBtn" class="btnNav" data-nav="Modifier"><img src="../img/img_for_dashbord_employe/crayon.png" class="imgButton" data-nav="Modifier">Modifier</button>
        <button id="SearchBtn" class="btnNav" data-nav="Rechercher"><img src="../img/img_for_dashbord_employe/loupe.png" class="imgButton" data-nav="Rechercher">Rechercher</button>
        <a href="../page_home/index.php">
            <button class="exit"><img src="../img/img_for_inscription/se-deconnecter.png" class="sortir"></button>
        </a>
        <div class="menu-container">
        <button id="btnMB"><img src="../img/img_for_dashbord_employe/fleche-droite.png" class="fleche-menu"></button>
        </div>

        <?php

        echo '<script type="module" defer>';
          if(isset($_GET['OPENEDModify'])){

              echo '
                  import { showModify } from "./main.js";
          
          
                  showModify()
                  ';
          }
          if(isset($_GET['OPENEDSearch'])){

            echo '
                import { showSearch } from "./main.js";
        
        
                showSearch()
                ';
        }
        if(isset($_GET['FailedAdd'])){
            echo '

            alert("Erreur : Login déja existant.")

            ';
        }
        


        
        echo '</script>';
        ?>
    </div>


    <!-- RIGHT DASHBOARD MENU -->


    <div id="dashboardPage" class="show">
        <header>
            <p class="welcome">Salut <?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}?> 👋</p>
            <p class="employe">Directeur</p>
        </header>
        <div class="main">
            <div class="containerLeft">
                <div class="yass">
                    <div class="containerimg">
                        <img src="../img/img_for_dashbord_employe/especes.png" class="imgcontainer">
                        <p class="titel">Directeurs</p>
                    </div>
                </div>
                <p class="number">

                    <?php

                        $DBCountDirector = "SELECT COUNT( * ) AS 'NbnDirector' FROM `personnels` WHERE `fonction` = 'Directeur'";
                        $DBQueryCountDirector = mysqli_query($DBlink, $DBCountDirector);
                        while($row = mysqli_fetch_assoc($DBQueryCountDirector)){
                            echo $row['NbnDirector'];
                        }

                    ?>
                </p>
            </div>
            <div class="containerRight">
                <div class="yass">
                    <div class="containerimg">
                        <img src="../img/img_for_dashbord_employe/animaux.png" class="imgcontainer">
                        <p class="titel">Employés</p>
                    </div>
                </div>
                <p class="number">
                    <?php

                        $DBCountEmployee = "SELECT COUNT( * ) AS 'NbnEmployee' FROM `personnels` WHERE `fonction` = 'Employé'";
                        $DBQueryCountEmployee = mysqli_query($DBlink, $DBCountEmployee);
                        while($row = mysqli_fetch_assoc($DBQueryCountEmployee)){
                            echo $row['NbnEmployee'];
                        }

                    ?>
                </p>
                </div>
            <div class="partbottom">
                <h2 id="showTableTitleDashBoard">Liste des Employés</h2>
                <select class="menuDeroulant" id="dashboardSelectTable">
                    <option value="employee">Employés</option>
                    <option value="director">Directeur</option>
                </select>
                <div class="tableContainer show" id="tableContainerEmployeeDashBoard">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Naissance</th>
                                <th>Login</th>
                                <th>Password</th>
                                <th>Salarie</th>
                                <th>Sexe</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            $DBShowEmployee = "SELECT * FROM `personnels` WHERE `fonction` = 'Employé'";

                            $DBQueryEmployee = mysqli_query($DBlink, $DBShowEmployee);

                            while($row = mysqli_fetch_assoc($DBQueryEmployee))
                            {
                                ?>

                                <tr>
                                    <form action="deletePersonnal.php" method="post">
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["nom"]; ?></td>
                                        <td><?php echo $row["prenom"]; ?></td>
                                        <td><?php echo $row["date_de_naissance"]; ?></td>
                                        <td><?php echo $row["login"]; ?></td>
                                        <td><?php echo $row["password"]; ?></td>
                                        <td><?php echo $row["salaire"]; ?></td>
                                        <td><?php echo $row["sexe"]; ?></td>
                                        <td><button class="buttonSupp">
                                            <img src="../img/img_for_dashbord_employe/poubelle.png" class="supp">
                                        </button>
                                        </td>
                                        <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                                    </form>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tableContainer" id="tableContainerDirectorDashBoard">
                    <table>
                        <thead>
                            <tr>
                            <th>Id</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Naissance</th>
                                <th>Login</th>
                                <th>Password</th>
                                <th>Salarie</th>
                                <th>Sexe</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            $DBShowDirector = "SELECT * FROM `personnels` WHERE `fonction` = 'Directeur'";

                            $DBQueryDirector = mysqli_query($DBlink, $DBShowDirector);

                            while($row = mysqli_fetch_assoc($DBQueryDirector))
                            {
                                ?>
                                    <tr>
                                        <form action="deletePersonnal.php" method="post">
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["nom"]; ?></td>
                                            <td><?php echo $row["prenom"]; ?></td>
                                            <td><?php echo $row["date_de_naissance"]; ?></td>
                                            <td><?php echo $row["login"]; ?></td>
                                            <td><?php echo $row["password"]; ?></td>
                                            <td><?php echo $row["salaire"]; ?></td>
                                            <td><?php echo $row["sexe"]; ?></td>
                                            <td><button class="buttonSupp">
                                                <img src="../img/img_for_dashbord_employe/poubelle.png" class="supp">
                                            </button>
                                            </td>
                                            <input type="hidden" name="id" value="<?php echo $row["id"];?>">
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
            <p class="employe">Directeur</p>
        </header>

        <form action="createPersonnal.php" method="post">
            <div class="mainAdd">
                <div class="select">
                    <select name="fonction" class="fonction" id="choixTypeModify">
                        <option value="Employé">Employés</option>
                        <option value="Directeur">Directeur</option>
                    </select>
                </div>
                <div class="pageAnimal show" id="pageAddAnimal">
                    <div class="grid-container">
                        <div class="grid-item">
                            <h2>Nom :</h2>
                            <input type="text" name="firstName" class="inputOne in" required>
                            <h2>Date de naissance :</h2>
                            <input type="text" name="birthdate" class="inputThree in" required>
                            <h2>Login :</h2>
                            <input type="text" name="login" class="inputTwo in" required>
                            </div>
                            <div class="grid-item">
                            <h2>Prenom :</h2>
                            <input type="text" name="lastName" class="inputTwo in" required>
                            <h2>Sexe :</h2>
                            <?php 
                                include '../select/selectGenderComponent.php';
                                selectedGender();
                            ?>
                            <h2>Password :</h2>
                            <input type="text" name="password" class="inputTwo in" required>
                        </div>
                    </div>
                </div>
                <div class="grid-item commentContainer">
                    <div>
                        <h3 class="salaire">Salarie :</h3>
                        <input type="number" name="salary" class="inputTwo in" min="0" max="99999.99" required>
                    </div>
                </div>
                <div class="button">
                    <button class="ajouter">Ajouter</button>
                </div>
            </div>
        </form>

    </div>


    <!-- RIGHT MODIFY MENU -->

    <div id="modifyPage">
        <header>
            <p class="welcome">Salut <?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}?> 👋</p>
            <p class="employe">Directeur</p>
        </header>
        <div class="mainAdd">
            <div class="select">
                <form action="showModifyPersonnal.php" method="post">
                    <?php
                        include '../select/selectPersonnalComponent.php';
                        if(isset($_GET['IdPersonnal'])){
                            selectedPersonnal($_GET['IdPersonnal']);
                        }
                        else{
                            selectedPersonnal();
                        }
                        ?>
                    <button class="ajouter">Choisir</button>
                </form>
            </div>
            
            <form id="ModifyValueContainer" action="modifyPersonnal.php" method="post">
                <?php
                    if(isset($_SESSION['OPENEDModify'])){
                        include 'showModifyPersonnal.php';
                        unset($_SESSION['OPENEDModify']);
                        unset($_SESSION['personnalId']);
                    }	
                ?>
            </form>
        </div>
    </div>


    <!-- RIGHT SEARCH MENU -->

    <div id="searchPage">
        <header>
            <p class="welcome">Salut <?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}?> 👋</p>
            <p class="employe">Directeur</p>
        </header>
        <div class="mainAdd">
            <form id="researchPersonnalContainer" action="searchPersonnal.php" method="post">
                <div class="recherche">
                    <img src="../img/img_for_dashbord_employe/recherche.png" class="imgRecherche">
                    <input type="text" name="search" class="barreRecherche" placeholder="Rechercher" required>
                </div>
                <button class="ajouter">Rechercher</button>
            </form>
            <?php
                if(isset($_SESSION['OPENEDSearch'])){
                    include 'searchPersonnal.php';
                    unset($_SESSION['OPENEDSearch']);
                    unset($_SESSION['searchPersonnal']);
                }
                ?>
        </div>
    </div>
</body>
</html>