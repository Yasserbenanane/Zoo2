<?php 


if(!function_exists('selectedAnimaux') ){
    function selectedAnimaux($selectedAnimaux = ""){

        include '../bdd.php';

        $DBSearchRace = 'SELECT * FROM `animaux`';
        
        $DBQueryRace = mysqli_query($DBlink, $DBSearchRace);
        
        echo '<select name="choixAnimaux" id="selectAnimal" class="choixId">';
        
        while($row = mysqli_fetch_assoc($DBQueryRace)){
            if($selectedAnimaux == $row["id"]){
                echo '<option value="' . $row["id"] . '" selected>' . $row["nom_animal"] . '</option>';
            }
            else{
                echo '<option value="' . $row["id"] . '">' . $row["nom_animal"] . '</option>';
            }
        }
        echo '</select>';

    }
}

?>