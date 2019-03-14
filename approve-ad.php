<?php 
	session_start();
	include 'db.php';
	include 'functions.php';

	$adId = $_GET['id'];
	$sql = "UPDATE ads SET ad_status='Published' WHERE ad_id =".$adId;
	$res = mysqli_query($linkDB, $sql);
	header('location: admin-ads.php?mess=The ad has been approved!!!');
 ?>