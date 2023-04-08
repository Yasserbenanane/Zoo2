<?php

if(!isset($_SESSION['OPENEDModifyRace'])){
    include '../bdd.php';
    session_start();

    $_SESSION['OPENEDModifyRace'] = true;

    $id = $_POST['race'];

    $_SESSION['IdRace'] = $id;

    echo "SELECT * FROM `especes` WHERE id='$id' ";

    header("location:index.php?OPENEDModify=true&IdRace=$id");

    
}
else{

    $id = $_SESSION['IdRace'];

    $DBSELECTRace = "SELECT * FROM `especes` WHERE id='$id' ";

    $DBQuerySELECTRace = mysqli_query($DBlink, $DBSELECTRace);

    while($row = mysqli_fetch_assoc($DBQuerySELECTRace)){

        ?>

                <div class="grid-container">
                    <input type="hidden" name="idRace" value="<?php echo $row["id"];?>">
                    <div class="grid-item">
                        <h2>Nom race :</h2>
                        <input type="text" name="nameRace" class="inputOne in"  value='<?php echo $row["nom_race"];?>' required>
                        <h2>Durée de vie :</h2>
                        <input type="text" name="lifeTime" class="inputThree in" value='<?php echo $row["duree_vie_moyenne"];?>' required>
                        </div>
                        <div class="grid-item">
                        <h2>Alimentation :</h2>
                        <?php

                            include '../select/selectFoodTypeComponent.php';
                            selectedFoodType($row["type_nourriture"]);

                        ?>
                        <h2>Aquatique :</h2>
                        <select name="aquatic" class="inputFour in" required>
                        <?php 
                            if($row["aquatique"] == "0"){
                                echo '<option value="0" selected>Oui</option>';
                                echo '<option value="1">Non</option>';
                            }
                            else{
                                echo '<option value="0">Oui</option>';
                                echo '<option value="1" selected>Non</option>';
                            }
                        ?>
                        </select>
                    </div> 
                </div>
                <div class="button">
                    <button class="ajouter">Modifier</button>
                </div>

        <?php
    }  
}


?>