<?php

if(!function_exists('selectedFonction') ){
    function selectedFonction($selectedFonction = ""){

        include '../bdd.php';

        $DBSearchFonction = 'SELECT * FROM `fonctions`';
        
        $DBQueryFonction = mysqli_query($DBlink, $DBSearchFonction);
        
        echo '<select name="fonction" class="fonction">';
        while($row = mysqli_fetch_assoc($DBQueryFonction)){
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