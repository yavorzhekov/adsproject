<?php
include 'db.php';
include 'functions.php';
$town=protectField($_POST['town']);
    $id = $_REQUEST["id"]; 
 	$sql= "UPDATE towns SET town_name='".$town."' WHERE town_id='".$id."'";
    $query=mysqli_query($linkDB, $sql);
   header('Location: admin-view-towns.php?mess=townChanged');


?>