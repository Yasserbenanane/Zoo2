<?php 

include '../bdd.php';

$id = $_POST['id'];

$DBDeleteRace = "DELETE FROM `especes` WHERE id = $id";


echo $DBDeleteRace;

$DBRemoveRace = mysqli_query($DBlink, $DBDeleteRace);

if($DBRemoveRace){
    header("location:index.php");
}
else{
    echo "ERROR";
}
?>