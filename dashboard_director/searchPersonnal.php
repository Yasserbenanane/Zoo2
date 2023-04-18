<?php 
if(!isset($_SESSION['OPENEDSearch'])){
    include '../bdd.php';
    session_start();

    $_SESSION['OPENEDSearch'] = true;

    $search = $_POST['search'];

    $_SESSION['searchPersonnal'] = $search;

    $DBSearchPersonnal = "SELECT * FROM `personnels` WHERE id LIKE '%$search%' OR `nom` LIKE '%$search%' OR `date_de_naissance` LIKE '%$search%' OR `prenom` LIKE '%$search%' OR `login` LIKE '%$search%' OR `password` LIKE '%$search%' OR `salaire` LIKE '%$search%' OR `sexe` LIKE '%$search%' OR `fonction` LIKE '%$search%'";

    echo $DBSearchAnimal;


    header("location:index.php?OPENEDSearch=true");
}else{
    $search = $_SESSION['searchPersonnal'];

    $query = "SELECT * FROM `personnels` WHERE id LIKE :search OR `nom` LIKE :search OR `date_de_naissance` LIKE :search OR `prenom` LIKE :search OR `login` LIKE :search OR `password` LIKE :search OR `salaire` LIKE :search OR `sexe` LIKE :search OR `fonction` LIKE :search";


    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':search', "%$search%");
    $stmt->execute();

?>

<div class="azerty show" id="SearchAnimauxTableContainer">
                <h2 id="showTableTitleSearch">Liste du personnel</h2>
                <div class="tableContainer show" id="tableContainerAnimauxSearch">
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
                while($row = $stmt->fetch()){

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
                }
                
                ?>
            </tbody>
        </table>
     </div>
</div>
