<?php
session_start();
include 'db.php';
include 'functions.php';
$email=protectField($_POST['email']);
$name=protectField($_POST['myname']);
$towns=protectField($_POST['towns']);
$phone=protectField($_POST['phone']);
$id=$_GET['id'];

$sql= "UPDATE members SET member_email='".$email. "', member_name='".$name. "', member_phone='".$phone. "',
 member_town='".$towns. "' WHERE member_id ='".$id."'";

 

$query = mysqli_query($linkDB, $sql);
header('Location: admin-view-users.php?mess=profileChanged');
?>
  