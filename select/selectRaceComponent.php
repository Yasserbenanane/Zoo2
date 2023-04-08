<?php 

// $DBSearchRace = 'SELECT * FROM `especes`';

// $DBQueryRace = mysqli_query($DBlink, $DBSearchRace);

// echo '<select name="race" id="race" class="choixId">';
// while($row = mysqli_fetch_assoc($DBQueryRace)){
//     echo '<option value="' . $row["id"] . '">' . $row["nom_race"] . '</option>';
// }
// echo '</select>';

// function selectedRace($selectedRace = ""){
    
//     include '../bdd.php';

//     $DBSearchRace = 'SELECT * FROM `especes`';

//     $DBQueryRace = mysqli_query($DBlink, $DBSearchRace);

//     echo '<select name="race" id="race" class="choixId">';
//     while($row = mysqli_fetch_assoc($DBQueryRace)){
//         if($row["nom_race"] == $selectedRace){
//             echo '<option value="' . $row["id"] . '" selected>' . $row["nom_race"] . '</option>';
//         }
//         else{
//             echo '<option value="' . $row["id"] . '">' . $row["nom_race"] . '</option>';
//         }
//     }
//     echo '</select>';
// }
    if(!function_exists('selectedRace') ){
        function selectedRace($selectedRace = ""){

            include '../bdd.php';
        
            $DBSearchRace = 'SELECT * FROM `especes`';
        
            $DBQueryRace = mysqli_query($DBlink, $DBSearchRace);
        
            echo '<select name="race" id="race" class="choixId" autocomplete="off">';
            while($row = mysqli_fetch_assoc($DBQueryRace)){
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