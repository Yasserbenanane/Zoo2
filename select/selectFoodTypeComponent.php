<?php 


if(!function_exists('selectedFoodType') ){
    function selectedFoodType($selectedFoodType = ""){

        include '../bdd.php';

        $DBSearchRace = 'SELECT * FROM `type_nourritures`';
        
        $DBQueryRace = mysqli_query($DBlink, $DBSearchRace);
        
        echo '<select name="foodType" id="foodType">';
        while($row = mysqli_fetch_assoc($DBQueryRace)){
            if($selectedFoodType == $row["type_nourriture"]){
                echo '<option value="' . $row["type_nourriture"] . '" selected>' . $row["type_nourriture"] . '</option>';
            }
            else{
                echo '<option value="' . $row["type_nourriture"] . '">' . $row["type_nourriture"] . '</option>';
            }
        }
        echo '</select>';

    }
}
?>