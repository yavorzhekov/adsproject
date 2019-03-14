<?php
 include 'db.php';
 include 'functions.php';
 $id = $_GET['id'];
 $sql ="DELETE FROM categories WHERE category_id='".$id."'";
 mysqli_query($linkDB, $sql);
 header('Location:admin-view-categories.php?mess=categoryDelete');
?>