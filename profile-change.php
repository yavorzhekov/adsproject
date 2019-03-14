<?php
session_start();
include 'db.php';
include 'functions.php';
$email=protectField($_POST['email']);
$name=protectField($_POST['myname']);
$towns=protectField($_POST['towns']);
$phone=protectField($_POST['phone']);

$sql= "UPDATE members SET member_email='".$email. "', member_name='".$name. "', member_phone='".$phone. "',
 member_town='".$towns. "' WHERE member_username ='".$_SESSION['username']."'";

 

$query = mysqli_query($linkDB, $sql);
header('Location: edit-profile.php?mess=profileChanged');
?>
  


 <!--  "'WHERE member_username ='".$_SESSION['username']."' -->