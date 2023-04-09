<?php 
if(!isset($_SESSION['OPENEDSearch'])){
    include '../bdd.php';
    session_start();

    $_SESSION['OPENEDSearch'] = true;

    $search = $_POST['search'];

    $_SESSION['searchAnimal'] = $search;

    $DBSearchAnimal = "SELECT * FROM `animaux` WHERE id LIKE '%$search%' OR `nom_animal` LIKE '%$search%' OR `date_de_naissance` LIKE '%$search%' OR `commentaire` LIKE '%$search%' OR `id_Especes` LIKE '%$search%' OR `sexe` LIKE '%$search%'";

    echo $DBSearchAnimal;


    header("location:index.php?OPENEDSearch=true");
}else{
    $search = $_SESSION['searchAnimal'];

    $DBSearchAnimal = "SELECT * FROM `animaux` WHERE id LIKE '%$search%' OR `nom_animal` LIKE '%$search%' OR `date_de_naissance` LIKE '%$search%' OR `commentaire` LIKE '%$search%' OR `id_Especes` LIKE '%$search%' OR `sexe` LIKE '%$search%'";


    $DBQuerySELECTRace = mysqli_query($DBlink, $DBSearchAnimal);

?>

<div class="azerty show" id="SearchAnimauxTableContainer">
    <h2 id="showTableTitleSearch">Liste des animaux</h2>
    <div class="tableContainer show" id="tableContainerAnimauxSearch">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Commentaire</th>
                    <th>Id especes</th>
                    <th>Sexe</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row = mysqli_fetch_assoc($DBQuerySELECTRace)){

                ?>
                    <tr>
                        <!-- <form action="deleteAnimaux.php" method="post"> -->
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
