<?php 


if(!function_exists('selectedFoodType') ){
    function selectedFoodType($selectedFoodType = ""){

        include '../bdd.php';

        $query = 'SELECT * FROM `type_nourritures`';
        
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        echo '<select name="foodType" id="foodType">';
        while($row = $stmt->fetch()){
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