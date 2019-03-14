<?php
include 'db.php';
include 'functions.php';
$title=protectField($_POST['title']);
$content=protectField($_POST['content']);
$img=protectField($_POST['result']);
$category=protectField($_POST['categories']);
$towns=protectField($_POST['towns']);
$id = $_GET["id"];
$sql= "UPDATE ads SET  ad_title='".$title."',ad_text='".$content."',ad_image='".$img."',
ad_category='".$category."',ad_town='".$towns."'
WHERE ad_id='".$id."'";
$query=mysqli_query($linkDB, $sql);
 header('Location: my-ads.php?mess=adChanged');


