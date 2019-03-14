<?php
 include 'db.php';
 include 'functions.php';
 $id = $_GET['id'];
 $sql ="DELETE FROM towns WHERE town_id='".$id."'";
 mysqli_query($linkDB, $sql);
 header('Location:admin-view-towns.php?mess=townDelete');
?>