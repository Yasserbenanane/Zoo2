<?php 


if(!function_exists('selectedAnimaux') ){
    function selectedAnimaux($selectedAnimaux = ""){

        include '../bdd.php';

        $query = 'SELECT * FROM `animaux`';

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        echo '<select name="choixAnimaux" id="selectAnimal" class="choixId">';
        
        while($row = $stmt->fetch()){
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