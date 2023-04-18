<?php 

// $DBSearchSexe = 'SELECT * FROM sexe';

// $DBQuerySexe = mysqli_query($DBlink, $DBSearchSexe);

// echo '<select name="gender" id="gender">';
// while($row = mysqli_fetch_assoc($DBQuerySexe)){
//     echo '<option value="' . $row["sexe"] . '">' . $row["sexe"] . '</option>';
// }
// echo '</select>';



// }
if(!function_exists('selectedGender') ){
    function selectedGender($selectedGender = ""){

        include '../bdd.php';
    
        $query = 'SELECT * FROM sexe';

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        echo '<select name="gender" id="gender" autocomplete="off">';
        while($row = $stmt->fetch()){
            if($row["sexe"] == $selectedGender){
                echo '<option value="' . $row["sexe"] . '" data-gender="selected" selected>' . $row["sexe"] . '</option>';
            }
            else{
                echo '<option value="' . $row["sexe"] . '">' . $row["sexe"] . '</option>';
            }
        }
        echo '</select>';

        
    }
}


?>

