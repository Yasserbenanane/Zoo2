<?php

if(!isset($_SESSION['OPENEDModify'])){
    include '../bdd.php';
    session_start();

    $_SESSION['OPENEDModify'] = true;

    $id = $_POST['personnalId'];

    $_SESSION['personnalId'] = $id;

    echo "SELECT * FROM `personnels` WHERE id='$id' ";

    header("location:index.php?OPENEDModify=true&IdPersonnal=$id");
}
else{

    $id = $_SESSION['personnalId'];

    $query = "SELECT * FROM `personnels` WHERE id=:id ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    while($row = $stmt->fetch()){

        ?>

                <div class="pageAnimal show" id="pageModifyAnimal">
                    <div class="grid-container">
                        <div class="grid-item">
                            <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                            <h2>Nom :</h2>
                            <input type="text" name="nom" class="inputOne in" value="<?php echo $row["nom"];?>">
                            <h2>Date de naissance :</h2>
                            <input type="text" name="date_de_naissance" class="inputThree in" value="<?php echo $row["date_de_naissance"];?>">
                            <h2>Login :</h2>
                            <input type="text" name="login" class="inputTwo in" value="<?php echo $row["login"];?>">
                        </div>
                        <div class="grid-item">
                                <h2>Prenom :</h2>
                                <input type="text" name="prenom" class="inputTwo in" value="<?php echo $row["prenom"];?>">
                                <h2>Sexe :</h2>
                                <?php
                                    include '../select/selectGenderComponent.php';
                                    selectedGender($row["sexe"]);
                                    ?>
                                <h2>Password :</h2>
                                <input type="text" name="password" class="inputTwo in" value="<?php echo $row["password"];?>">
                            </div>
                        </div>
                    </div>
                    <div class="grid-item commentContainer">
                        <div>
                            <h3 class="salary">Salarie :</h3>
                            <input type="number" name="salary" class="inputTwo in" min="0" max="99999.99" value="<?php echo $row["salaire"];?>">
                        </div>
                    </div>
                    <div class="button">
                        <button class="ajouter">Modifier</button>
                    </div>
                </div>

        <?php
    }  
}


?>