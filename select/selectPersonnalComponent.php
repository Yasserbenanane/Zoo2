<?php

if(!function_exists('selectedFonction') ){
    function selectedPersonnal($selectedPersonnal = ""){

        include '../bdd.php';

        $DBSearchPersonnal = 'SELECT * FROM `personnels`';
        
        $DBQueryPersonnal = mysqli_query($DBlink, $DBSearchPersonnal);
        
        echo '<select name="personnalId" class="selectPersonnal choixId">';
        while($row = mysqli_fetch_assoc($DBQueryPersonnal)){
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