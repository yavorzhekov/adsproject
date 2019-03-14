<?php
include 'db.php';
include 'functions.php';
$category=protectField($_POST['category']);
    $id = $_REQUEST["id"]; 
    // print_r($id);
    // var_dump($_REQUEST);
 	
 	$sql= "UPDATE categories SET category_name='".$category."' WHERE category_id='".$id."'";
    $query=mysqli_query($linkDB, $sql);

   header('Location: admin-view-categories.php?mess=categoryChanged');


?>
