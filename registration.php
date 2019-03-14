<?php
include 'db.php';
include 'functions.php';
$username=protectField($_POST['username']);
$email=protectField($_POST['email']);
$pass=protectField($_POST['pass']);
$name=protectField($_POST['myname']);
$towns=protectField($_POST['towns']);
$phone=protectField($_POST['phone']);

$sql= "INSERT INTO members(member_username,member_pass, member_name, member_email,member_phone,member_town) VALUES  ('".$username."', 
'".md5($pass)."', '".$name."', '".$email."', '".$phone."', '".$towns."')";
if(isUserExist($email,$username)){
	$query = mysqli_query($linkDB, $sql);
	header('Location: register.php?mess=sr');
}
else{
	header('Location: index.php?mess=wr');
}
?>