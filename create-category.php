<?php
include 'db.php';
 include 'functions.php';
 $category= protectField($_POST['category']);
 $sql ="INSERT INTO categories(category_name) VALUES ('".$category."')";
 mysqli_query($linkDB, $sql);
 header('Location:admin-view-categories.php?mess=categoryCreated');
?>