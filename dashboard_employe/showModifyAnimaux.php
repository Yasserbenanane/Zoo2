<?php

if(!isset($_SESSION['OPENEDModify'])){
    include '../bdd.php';
    session_start();

    $_SESSION['OPENEDModify'] = true;

    $id = $_POST['choixAnimaux'];

    $_SESSION['IdAnimaux'] = $id;

    echo "SELECT * FROM `animaux` WHERE id='$id' ";

    header("location:index.php?OPENEDModify=true&IdAnimaux=$id");
}
else{

    $id = $_SESSION['IdAnimaux'];

    $query = "SELECT * FROM `animaux` WHERE id=:id ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();


    while($row = $stmt->fetch()){

        ?>

                        <div class="grid-container">
                            <input type="hidden" name="idAnimal" value="<?php echo $row["id"];?>">
                            <div class="grid-item">
                                <h2>Nom :</h2>
                                <input type="text" name="nameAnimal" class="inputOne in" value='<?php echo $row["nom_animal"];?>' required>
                                <h2>Année de naissance :</h2>
                                <input type="text" name="birthdate" class="inputThree in" value='<?php echo $row["date_de_naissance"];?>' required>
                                </div>
                                <div class="grid-item">
                                <h2>Especes :</h2>
                                <?php 
                                 include '../select/selectRaceComponent.php';
                                 selectedRace($row["id_Especes"]);
                                ?>
                                <h2>Sexe :</h2>
                                <?php 
                                     include '../select/selectGenderComponent.php';
                                     selectedGender($row["sexe"]);
                                ?>
                            </div>
                        </div>
                        <div class="grid-item commentContainer">
                            <div>
                                <h3>Commentaire :</h3>
                                <textarea name="comment" class="inputFive"><?php echo $row["commentaire"];?></textarea>
                            </div>
                        </div>
                        <div class="button">
                            <button class="ajouter">Modifier</button>
                        </div>

        <?php
    }  
}


?>