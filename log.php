<?php
include 'db.php';
include 'functions.php';
$username=protectField($_POST['username']);
$pass=protectField($_POST['pass']);

$sql= "SELECT * FROM  members WHERE member_username='".$username."' AND member_pass='".md5($pass)."'";
$res=mysqli_query($linkDB, $sql);
 if(mysqli_num_rows($res) == 1) {
	if($row=mysqli_fetch_assoc($res)) {
		session_start();
		$_SESSION['username']=$row['member_username'];
		$_SESSION['owner-id']=$row['member_id'];
		//print_r($_SESSION);
		//print_r($row['member_username']);
		header("Location: index.php?msg=success");
	}
}
else{
	header("Location: login.php?msg=wr"); 
}

?>