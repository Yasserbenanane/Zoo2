<?php 
if(!isset($_SESSION['searchRace'])){
    include '../bdd.php';
    session_start();

    $_SESSION['showSearchRace'] = true;

    $search = $_POST['search'];

    $_SESSION['searchRace'] = $search;

    $DBSearchRace = "SELECT * FROM `especes` WHERE id LIKE '%$search%' OR `nom_race` LIKE '%$search%' OR `duree_vie_moyenne` LIKE '%$search%' OR `aquatique` LIKE '%$search%' OR `type_nourriture` LIKE '%$search%'";

    echo $DBSearchAnimal;


    header("location:index.php?OPENEDSearch=true&SearchRace=$search");
}else{
    $search = $_SESSION['searchRace'];

    $DBSearchRace = "SELECT * FROM `especes` WHERE id LIKE '%$search%' OR `nom_race` LIKE '%$search%' OR `duree_vie_moyenne` LIKE '%$search%' OR `aquatique` LIKE '%$search%' OR `type_nourriture` LIKE '%$search%'";


    $DBQuerySELECTRace = mysqli_query($DBlink, $DBSearchRace);

?>

<div class="azerty show" id="SearchRaceTableContainer">
    <h2 id="showTableTitleSearch">Liste des animaux</h2>
    <div class="tableContainer show" id="tableContainerRaceSearch">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Alimentation</th>
                    <th>Durée de vie</th>
                    <th>Aquatique</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row = mysqli_fetch_assoc($DBQuerySELECTRace)){

                ?>
                    <tr>
                        <!-- <form action="deleteRace.php" method="post"> -->
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
                            <td>
                                <button class="buttonSupp">
                                    <img src="../img/img_for_dashbord_employe/poubelle.png" class="supp">
                                </button>
                            </td>
                        <!-- </form> -->
                    </tr> 
                <?php

                    }
                }
                
                ?>
            </tbody>
        </table>
     </div>
</div>
