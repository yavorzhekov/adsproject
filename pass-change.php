<?php
session_start();
include 'db.php';
include 'functions.php';
$oldPass=protectField($_POST['oldpass']);
$newPass=protectField($_POST['newpass']);
$confPass=protectField($_POST['confpass']);

if($newPass==$confPass){
	$sql="UPDATE members SET member_pass= '".md5($newPass). "' WHERE member_pass ='".md5($oldPass)."'";
	$query=mysqli_query($linkDB,$sql);
	header('Location: admin-view-users.php?mess=PassChanged');

}
else{
	 header('Location: admin-view-users.php?mess=wrpass');
}
?
