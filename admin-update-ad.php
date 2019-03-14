<?php
include 'db.php';
include 'functions.php';
$title=protectField($_POST['title']);
$content=protectField($_POST['content']);
$img=protectField($_POST['result']);
// $username=protectField($_POST['user']);
$category=protectField($_POST['categories']);
$towns=protectField($_POST['towns']);
$status=protectField($_POST['status']);
$date=protectField($_POST['date']);
$id = $_GET["id"];
$sql= "UPDATE ads SET  ad_title='".$title."',ad_text='".$content."',ad_image='".$img."',
ad_category='".$category."',ad_town='".$towns."',ad_status='".$status."',ad_date='".$date."'
WHERE ad_id='".$id."'";
$query=mysqli_query($linkDB, $sql);
 header('Location: admin-ads.php?mess=adChanged');



 
?>