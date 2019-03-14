<?php
 include 'db.php';
 include 'functions.php';
 $id = $_GET['id'];
 $sql ="DELETE FROM ads WHERE ad_id='".$id."'";
 mysqli_query($linkDB, $sql);
 header('Location:admin-ads.php?mess=adDelete');
?>