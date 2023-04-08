<?php 

include '../bdd.php';

$id = $_POST['id'];

$DBDeletePersonnal = "DELETE FROM `personnels` WHERE id = $id";


echo $DBDeletePersonnal;

$DBRemovePersonnal = mysqli_query($DBlink, $DBDeletePersonnal);

if($DBRemovePersonnal){
    header("location:index.php");
}
else{
    echo "ERROR";
}
?>