<?php
    session_start();
    
    if(!isset($_SESSION['login'])){
        header('location:../index.php');
    }
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
    <header>
        <img src="../img/img_for_home/lion_logo.png" id="logoLion">
        <p class="titelHeader">Zoo</p>
        <div class="buttonHeader">
            <?php
                if(isset($_SESSION['fonction'])){
                    echo '<a href="../dashboard_employe/index.php"><button>Animaux dashboard</button></a>';
                    if($_SESSION['fonction'] == "Directeur"){
                        echo '<a href="../dashboard_director/index.php"><button>Employés dashboard</button></a>';
                    }
                }
                ?>
            <a href="../page_contact/index.html"><button>Contact</button></a>
            <a href="logout.php"><button class="exit">Déconnection</button></a>
        </div>
        <button id="btnBurger"><img src="../img/img_for_home/menuBurger.png" class="imgMenu"></button>
    </header>
    <div class="partTop">
        <h1 class="textWelcome">Bienvenue 
            <?php if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
        }?></h1>
    </div>
    <div class="parallaxTop"></div>
    <div class="titelcenter">
        <img src="../img/img_for_home/liane.png" class="branche left">
        <h2 class="event">Événements</h2>
        <img src="../img/img_for_home/liane.png" class="branche right">
    </div>
    <div class="partCenter">
        <img src="../img/img_for_home/feuille.png" class="feuilleOne">
        <div class="box">
            <div class="carteOne">
                <img src="../img/img_for_home/img_safari.png" class="safari">
                <div class="carteOneInfo">
                    <h3 class="dateEvent">10 novembre</h3>
                    <img src="../img/img_for_home/logo_info.png" class="zoneBlache">
                    <p class="text">Safari des lions</p>
                    <img src="../img/img_for_home/logo_localisation.png" class="zoneBlache">
                    <p class="text">Zone Savane</p>
                    <img src="../img/img_for_home/logo_pp.png" class="zoneBlache">
                    <p class="text">50 personnes</p>
                    <p class="heureEvent">18h30-20h10</p>
                </div>
            </div>
            <div class="carteTow">
                <img src="../img/img_for_home/img_foret.png" class="safari">
                <div class="carteOneInfo">
                    <h3 class="dateEvent">9 novembre</h3>
                    <img src="../img/img_for_home/logo_info.png" class="zoneBlache">
                    <p class="text">Chasse au trésor</p>
                    <img src="../img/img_for_home/logo_localisation.png" class="zoneBlache">
                    <p class="text">Zone Jungle</p>
                    <img src="../img/img_for_home/logo_pp.png" class="zoneBlache">
                    <p class="text">25 personnes</p>
                    <p class="heureEvent">15h30-18h10</p>
                </div>
            </div>
            <div class="carteThree">
                <img src="../img/img_for_home/img_zoo.png" class="safari">
                <div class="carteOneInfo">
                    <h3 class="dateEvent">8 novembre</h3>
                    <img src="../img/img_for_home/logo_info.png" class="zoneBlache">
                    <p class="text">Enigme</p>
                    <img src="../img/img_for_home/logo_localisation.png" class="zoneBlache">
                    <p class="text">Zone parc</p>
                    <img src="../img/img_for_home/logo_pp.png" class="zoneBlache">
                    <p class="text">250 personnes</p>
                    <p class="heureEvent">18h30-20h10</p>
                </div>
            </div>
            <img src="../img/img_for_home/feuille.png" class="feuilleTwo">
        </div>
    </div>
    <div class="parallaxBottom"></div>
    <div class="partBottom">
        <img src="../img/img_for_home/loupe.png" id="loup"> 
        <p class="titelBottom">Statistiques</p>
        <img src="../img/img_for_home/stat.png" id="stat" >
    </div>
    <div id="containerDown">
        <img src="../img/img_for_home/cartoon_lion.png" class="imgLion">
        <div class="infoPartDown">
            <p class="textStat">Entrée annuelle</p>
            <div class="numberTicket">
                <p class="number num" data-val="2518">2518</p>
                <img src="../img/img_for_home/ticket.png" id="ticket">
            </div>
        </div>
        <img src="../img/img_for_home/arbre.png" class="arbre">
        <img src="../img/img_for_home/peroquet.png" class="peroquet">
        <div class="infoPartDown">
            <div class="textStat">
                <p class="textStat">Dons reçus</p>
            </div>
            <div class="numberTicket">
                <p class="number num" data-val="5010">5010</p>
                <img src="../img/img_for_home/logo_spa.png" id="spa">
            </div>
            <img src="../img/img_for_home/girafe.png" class="Girafe">
        </div>
        <p id="signature">Crée par Benanane Yasser & Cabaret Romain</p>
    </div>
</body>
</html>