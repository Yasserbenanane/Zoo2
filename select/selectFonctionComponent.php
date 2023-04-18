<?php

if(!function_exists('selectedFonction') ){
    function selectedFonction($selectedFonction = ""){

        include '../bdd.php';

        $query = 'SELECT * FROM `fonctions`';
        
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        echo '<select name="fonction" class="fonction">';
        while($row = $stmt->fetch()){
            if($selectedFonction == $row["fonction"]){
                echo '<option value="' . $row["fonction"] . '" selected>' . $row["fonction"] . '</option>';
            }
            else{
                echo '<option value="' . $row["fonction"] . '">' . $row["fonction"] . '</option>';
            }
        }
        echo '</select>';

    }
}
?>