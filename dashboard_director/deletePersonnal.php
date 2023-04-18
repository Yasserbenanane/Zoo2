<?php 

include '../bdd.php';

$id = $_POST['id'];

$query = "DELETE FROM `personnels` WHERE id = :id";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

echo $query;

if($stmt){
    header("location:index.php");
}
else{
    echo "ERROR";
}
?>