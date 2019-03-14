<?php
include 'db.php';
 include 'functions.php';
 $id = $_GET['id'];
 $sql ="DELETE FROM members WHERE member_id='".$id."'";
 mysqli_query($linkDB, $sql);
 header('Location:admin-view-users.php?mess=userDelete');
 ?>