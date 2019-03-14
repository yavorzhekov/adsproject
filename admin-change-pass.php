<?php
session_start();
include 'db.php';
include 'functions.php';
$newPass=protectField($_POST['newpass']);
$confPass=protectField($_POST['confpass']);
$id=$_GET['id'];
echo $id;
if($newPass==$confPass){
	$sql="UPDATE members SET member_pass= '".md5($newPass). "' WHERE member_id ='".$id."'";
	$query=mysqli_query($linkDB,$sql);
	header('Location: admin-view-users.php?mess=PassChanged');

}
else{
	 header('Location: admin-view-users.php?mess=wrpass');
}
?>