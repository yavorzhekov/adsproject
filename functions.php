<?php
include 'db.php';
function checkCatIds() {
  
}
function addValidation($adTitle, $userId) {
  include 'db.php';
  $sql = "SELECT * FROM ads WHERE owner_id =".$userId." AND ad_title = '".$adTitle."'";
  $res = mysqli_query($linkDB, $sql);
  $numRows = mysqli_num_rows($res);
  if($numRows == 0) {
    return true;
  }
  else {
    return false;
  }
}
// ====================================================
function getAllUsers($usersOnPage=null, $pageId=null) {
  include 'db.php';   
  if($usersOnPage==null &&$pageId==null){
  $sql = "SELECT * FROM members"; 
  $query = mysqli_query($linkDB, $sql);
  while($res = mysqli_fetch_assoc($query)) {
    $row [] = $res;
  }
  return $row;
  }
  else{
  $usersFrom = ($usersOnPage*$pageId) - $usersOnPage;
   $sql = "SELECT * FROM members LIMIT ".$usersFrom.", ".$usersOnPage;
  $query = mysqli_query($linkDB, $sql);
  while($res = mysqli_fetch_assoc($query)) {
    $row [] = $res;
  }
  return $row;
  }
  }
// =======================================================
function getCurrentUser($id){
  include 'db.php';   
  $sql = "SELECT * FROM members WHERE member_id=$id" ; 
  $query = mysqli_query($linkDB, $sql);
  while($res = mysqli_fetch_assoc($query)) {
    $row [] = $res;
  }
  return $row;
}
// ==========================================================
function showTowns($townsOnPage=null, $pageId=null){
	include 'db.php';
  if ($townsOnPage==null &&$pageId==null){
	$sql="SELECT *FROM towns";
     $query = mysqli_query($linkDB, $sql);
          $row = null;
          while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
          }
          return $row;
  }
  else{
    $townsFrom = ($townsOnPage*$pageId) - $townsOnPage;
    $sql="SELECT *FROM towns LIMIT ".$townsFrom.", ".$townsOnPage;
     $query = mysqli_query($linkDB, $sql);
          $row = null;
          while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
          }
          return $row;

  }
}
// =======================================================
function showCategories($catsOnPage=null, $pageId=null){
	include 'db.php';
  if($catsOnPage==null && $pageId==null){
    $sql="SELECT * FROM categories";
     $query = mysqli_query($linkDB, $sql);
          $row = null;
          while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
          }
          return $row;
}
  else{
  $catsFrom = ($catsOnPage*$pageId) - $catsOnPage;
  $sql="SELECT * FROM categories LIMIT ".$catsFrom.", ".$catsOnPage;
     $query = mysqli_query($linkDB, $sql);
          $row = null;
          while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
          }
          return $row;
  }
}
//=======================================================================	
function getCategory($id) {
  include 'db.php';
  $sql = "SELECT categories.category_id, categories.category_name, ads.ad_category 
  FROM categories INNER JOIN ads ON categories.category_id =".$id;
  $query = mysqli_query($linkDB,$sql);
  $row = null; 
  while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
  }
  return $row;
}
function getTown($id) {
  include 'db.php';
  $sql = "SELECT towns.town_id, towns.town_name, ads.ad_town 
  FROM towns INNER JOIN ads ON towns.town_id =".$id;
  $query = mysqli_query($linkDB,$sql);
  $row = null; 
  while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
  }
  return $row;
}
function showAds(){
         include 'db.php';
	     $sql="SELECT * FROM ads";  #WHERE ad_status = 1; 
       //ad_status: 0 - Waiting approval, 1 - Approved, 2 - Rejected, 3 - Inactive;
         $query = mysqli_query($linkDB, $sql);
         $row = null;
         while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
          }
          return $row;
}

//COUNTS ALL PRODUCTS IN TABLE
function countProducts($table, $ownerId, $status=null){
  include 'db.php';
  if($status==null){
  $countProd = "SELECT COUNT(*) as countedProd FROM $table WHERE owner_id=".$ownerId;
  $count = mysqli_query($linkDB, $countProd);
  $res = mysqli_fetch_assoc($count);
  return $res;
}
else{
   $countProd = "SELECT COUNT(*) as countedProd FROM $table WHERE owner_id='".$ownerId."' AND ad_status='".$status."'";
  $count = mysqli_query($linkDB, $countProd);
  $res = mysqli_fetch_assoc($count);
  return $res;
}
  
}
// =================================================================================================
function showMyAds($id, $adsOnPage, $page, $status=null){
         include 'db.php';
         $adsFrom = ($adsOnPage*$page) - $adsOnPage;//start from this number in table
         if($status==null){
            $sql="SELECT * FROM ads WHERE owner_id=".$id." 
            LIMIT ".$adsFrom.", ".$adsOnPage;
            }  
          else{
            $sql="SELECT * FROM ads WHERE owner_id=".$id." AND ad_status='".$status."' 
            LIMIT ".$adsFrom.", ".$adsOnPage;
          }
         $query = mysqli_query($linkDB, $sql);
         $row = null;
         while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
          }
          return $row;
       
       
}
// ===========================================================================================================
function getAdStatus($status) {
  include 'db.php';
  $sql = "SELECT * FROM ads WHERE ad_status='".$status."'";
 
  $query = mysqli_query($linkDB, $sql);
  $row=null;
  while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
  }
  return $row;
  
}
function protectField($field){
	return htmlspecialchars(strip_tags($field));
}
function isUserExist($email,$username){
	include 'db.php';
		$sql = "SELECT * FROM members WHERE member_email = '".$email."' OR member_username='".$username."'";
		$result = mysqli_query($linkDB, $sql);
		$numRows = mysqli_num_rows($result);
		 if( $numRows == 0) {
		 	return true;
		 }
		 else {
		 	return false;
		 }
}
function userInfo (){
	include 'db.php';
	$sql="SELECT * FROM members WHERE member_username = '".$_SESSION['username']."'";
	$query = mysqli_query($linkDB, $sql);
    $row = null;
    while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
          }
          return $row;
}
function adInfo2($id){
include 'db.php';
$sql= "SELECT ads.ad_id, ads.ad_title, ads.ad_text, ads.ad_date, 
ads.ad_image, categories.category_name, categories.category_id,
towns.town_name,towns.town_id, ads.ad_status, members.member_username,
members.member_email, members.member_name, members.member_phone FROM ads 
INNER JOIN members  ON ads.owner_id=members.member_id
INNER JOIN categories ON ads.ad_category=categories.category_id
INNER JOIN towns ON ads.ad_town=towns.town_id 
WHERE ads.ad_id=$id";
$query = mysqli_query($linkDB,$sql);
  $row = null; 
  while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
  }
  return $row;
}

function adInfo($adsOnPage, $pageId, $status=null){
include 'db.php';
 $adsFrom = ($adsOnPage*$pageId) - $adsOnPage;//start from this number in table

if($status==null){
$sql= "SELECT ads.ad_id, ads.ad_title, ads.ad_text, ads.ad_date, ads.ad_image, categories.category_name, 
towns.town_name, ads.ad_status, members.member_username, members.member_name,
members.member_email,members.member_phone FROM ads 
INNER JOIN members  ON ads.owner_id=members.member_id
INNER JOIN categories ON ads.ad_category=categories.category_id
INNER JOIN towns ON ads.ad_town=towns.town_id LIMIT ".$adsFrom.", ".$adsOnPage;
} 
else{     // echo "<script>alert(".$adsFrom.");</script>"; #WHERE ad_status = 1 4;
$sql= "SELECT ads.ad_id, ads.ad_title, ads.ad_text, ads.ad_date, ads.ad_image, categories.category_name, 
towns.town_name, ads.ad_status, members.member_username, members.member_name,
members.member_email,members.member_phone FROM ads 
INNER JOIN members  ON ads.owner_id=members.member_id
INNER JOIN categories ON ads.ad_category=categories.category_id
INNER JOIN towns ON ads.ad_town=towns.town_id WHERE ads.ad_status='".$status."' 
LIMIT ".$adsFrom.", ".$adsOnPage;
}  
$query = mysqli_query($linkDB,$sql);
  $row = null; 
  while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
  }
  return $row;
}


function adInfo4($adsOnPage, $pageId, $townId, $catId, $status=null){
include 'db.php';
$adsFrom = ($adsOnPage*$pageId) - $adsOnPage;
if ($townId==0 || $catId==0){
       if($status==null){

       
            $sql= "SELECT ads.ad_id, ads.ad_title, ads.ad_text, ads.ad_date, ads.ad_image, categories.category_name, 
            towns.town_name, ads.ad_status, members.member_username, members.member_name,
            members.member_email,members.member_phone FROM ads 
            INNER JOIN members  ON ads.owner_id=members.member_id
            INNER JOIN categories ON ads.ad_category=categories.category_id
            INNER JOIN towns ON ads.ad_town=towns.town_id 
            WHERE (ads.ad_category='".$catId."' OR ads.ad_town='".$townId."')
            LIMIT ".$adsFrom.", ".$adsOnPage;
      }
      else{
        $sql= "SELECT ads.ad_id, ads.ad_title, ads.ad_text, ads.ad_date, ads.ad_image, categories.category_name, 
            towns.town_name, ads.ad_status, members.member_username, members.member_name,
            members.member_email,members.member_phone FROM ads 
            INNER JOIN members  ON ads.owner_id=members.member_id
            INNER JOIN categories ON ads.ad_category=categories.category_id
            INNER JOIN towns ON ads.ad_town=towns.town_id 
            WHERE (ads.ad_category='".$catId."' OR ads.ad_town='".$townId."') AND ads.ad_status='".$status."'
            LIMIT ".$adsFrom.", ".$adsOnPage;
      }
}

else{
  if($status==null){

             $sql= "SELECT ads.ad_id, ads.ad_title, ads.ad_text, ads.ad_date, ads.ad_image, categories.category_name, 
              towns.town_name, ads.ad_status, members.member_username, members.member_name,
              members.member_email,members.member_phone FROM ads 
              INNER JOIN members  ON ads.owner_id=members.member_id
              INNER JOIN categories ON ads.ad_category=categories.category_id
              INNER JOIN towns ON ads.ad_town=towns.town_id 
              WHERE (ads.ad_category='".$catId."' AND ads.ad_town='".$townId."')
              LIMIT ".$adsFrom.", ".$adsOnPage;
            }
        else{
            $sql= "SELECT ads.ad_id, ads.ad_title, ads.ad_text, ads.ad_date, ads.ad_image, categories.category_name, 
            towns.town_name, ads.ad_status, members.member_username, members.member_name,
            members.member_email,members.member_phone FROM ads 
            INNER JOIN members  ON ads.owner_id=members.member_id
            INNER JOIN categories ON ads.ad_category=categories.category_id
            INNER JOIN towns ON ads.ad_town=towns.town_id 
            WHERE (ads.ad_category='".$catId."' AND ads.ad_town='".$townId."') AND ads.ad_status='".$status."'
            LIMIT ".$adsFrom.", ".$adsOnPage;
        }
}
$query = mysqli_query($linkDB,$sql);
  $row = null; 
  while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
  }
  return $row;
}

function countAds($status=null, $townId, $catId){
  include 'db.php';

  if ($townId==0 || $catId==0){
    if($status==null){

    $sql = "SELECT * FROM ads WHERE (ad_category='".$catId."' OR ad_town='".$townId."')";
  } else {
    
    $sql = "SELECT * FROM ads WHERE (ad_category='".$catId."' OR ad_town='".$townId."') AND ad_status='".$status."'";
  }
  }
  else{
    if($status==null){
      
      $sql = "SELECT * FROM ads WHERE ad_category='".$catId."' AND ad_town='".$townId."'";
    } else {
      
      $sql = "SELECT * FROM ads WHERE (ad_category='".$catId."' AND ad_town='".$townId."') AND ad_status='".$status."'";
    }   
  }
  $query = mysqli_query($linkDB, $sql);
  $row=null;
  while($res = mysqli_fetch_assoc($query)) {
             $row [] = $res;
  }
  return $row;
}
?>

