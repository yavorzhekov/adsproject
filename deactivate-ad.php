<?php
include 'db.php';
include 'functions.php';
$id = $_GET["id"];
$sql= "UPDATE ads SET  ad_status='Inactive'
WHERE ad_id=".$id;
$query=mysqli_query($linkDB, $sql);
 header('Location: inactive-ads.php?mess=deactivate');



 
?>