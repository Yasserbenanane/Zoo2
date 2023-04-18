<?php 

    if(!function_exists('selectedRace') ){
        function selectedRace($selectedRace = ""){

            include '../bdd.php';
        
            $query = 'SELECT * FROM `especes`';
        
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        
            echo '<select name="race" id="race" class="choixId" autocomplete="off">';
            while($row = $stmt->fetch()){
                if($row["id"] == $selectedRace){
                    echo '<option value="' . $row["id"] . '" data-race="selected" selected>' . $row["nom_race"] . '</option>';
                }
                else{
                    echo '<option value="' . $row["id"] . '">' . $row["nom_race"] . '</option>';
                }
            }
            echo '</select>';
        }
    }



?>