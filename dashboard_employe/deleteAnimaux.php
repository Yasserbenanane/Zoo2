<?php 

include '../bdd.php';

$id = $_POST['id'];

$DBDeleteAnimaux = "DELETE FROM `animaux` WHERE id = $id";


echo $DBDeleteAnimaux;

$DBRemoveAnimaux = mysqli_query($DBlink, $DBDeleteAnimaux);

if($DBRemoveAnimaux){
    header("location:index.php");
}
else{
    echo "ERROR";
}
?>