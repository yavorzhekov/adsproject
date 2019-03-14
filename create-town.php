<?php
include 'db.php';
 include 'functions.php';
 $town= protectField($_POST['town']);
 $sql ="INSERT INTO towns(town_name) VALUES ('".$town."')";
 mysqli_query($linkDB, $sql);
 header('Location:admin-view-towns.php?mess=townCreated');
?>