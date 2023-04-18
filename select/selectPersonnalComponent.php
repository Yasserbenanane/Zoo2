<?php

if(!function_exists('selectedFonction') ){
    function selectedPersonnal($selectedPersonnal = ""){

        include '../bdd.php';

        $query = 'SELECT * FROM `personnels`';
        
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        echo '<select name="personnalId" class="selectPersonnal choixId">';
        while($row = $stmt->fetch()){
            if($selectedPersonnal == $row["id"]){
                echo '<option value="' . $row["id"] . '" selected>' . $row["login"] . '</option>';
            }
            else{
                echo '<option value="' . $row["id"] . '">' . $row["login"] . '</option>';
            }
        }
        echo '</select>';

    }
}
?>