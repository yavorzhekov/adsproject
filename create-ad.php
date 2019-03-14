<?php
session_start();
include 'db.php';
include 'functions.php';
$title=protectField($_POST['title']);
$text=protectField($_POST['content']);
$img=protectField($_POST['img']);
$category=protectField($_POST['categories']);
$towns=protectField($_POST['towns']);
$date=date("d-M-Y");
$status= "Waiting Approval";
//echo $img;
//echo $_SESSION['owner-id'];
$sql= "INSERT INTO ads(owner_id, ad_title,ad_text, ad_image, ad_category,ad_town, ad_date, ad_status) 
VALUES  (".$_SESSION['owner-id'].",'".$title."', 
'".$text."', '".$img."', '".$category."', '".$towns."', '".$date."','".$status."')";
if(addValidation($title, $_SESSION['owner-id'])) {
	$query = mysqli_query($linkDB, $sql);
	header('Location: new-ad.php?mess=published');
}
else {
	header('Location: new-ad.php?mess=not published');
}

?>