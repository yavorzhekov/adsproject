<?php session_start(); 
include 'db.php'; 
include 'functions.php';
 ?>
<html>
<head>
	<meta charset="utf-8">
	<title>Yavor ads</title>
	<!--[if lt IE 9]>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<![endif]-->
  	<link rel="stylesheet" type="text/css" href="css/main.css">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  	<script src="js/jquery.js"></script>
  <style >
  	div#main-content{
  		margin-bottom:40px;
  	}
  	div.bordered{
  		border:1px solid #507e32;
  		width:100.5%;
  	}
  	div.my-pagination{
  	width:520px !important;
  	position:relative;
	left: calc(43% - 520px / 2);
     }
  </style>
</head>
<body>

	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Ads – My Ads</h1>
			  	<?php
			  	if(isset($_SESSION['username'])) {
                echo "<span class='col-md-1 text-right'>". $_SESSION['username']."</span>".
                '<a href="logout.php" title="login or register" class="col-md-1 text-right">Logout</a>';
                 
           		 }
                ?>
			</nav>
	  <!-- End of Header -->
		</header>
		<div class="row" id="main-content">
			<div class="col-md-2 left-part"  >
				<div class="card mb-3 bordered" style="margin-bottom:10px; " >
				  <h1 class="text-center">Navigation</h1>
				  <div class="line"></div>
				  <nav id="left-nav">
				  	<ul>
					  <li>
					    <a href="index.php">Home</a>
					  </li>
					  <li>
					    <a href="my-ads.php" style="background: #daa600;">My Ads</a>
					  </li>
					  <li>
					    <a href="new-ad.php">Publish New Ad</a>
					  </li>
					  <li>
					    <a href="edit-profile.php">Edit Profile</a>
					  </li>
					</ul>
				  </nav>
				</div>
				<div class="card mb-3 bordered" style="margin-bottom:30px;" >
				  <h1 class="text-center">My Ads</h1>
				  <div class="line"></div>
				  <nav id="left-nav">
				  	<ul>
					  <li>
					    <a href="my-ads.php" >All</a>
					  </li>
					  <li>
					    <a href="published-ads.php">Published</a>
					  </li>
					  <li>
					    <a href="for-approval.php"style="background: #daa600;">Waiting Approval</a>
					  </li>
					  <li>
					    <a href="inactive-ads.php">Inactive</a>
					  </li>
					  <li>
					    <a href="rejected-ads.php">Rejected</a>
					  </li>
					</ul>
				  </nav>
				</div>

                
			</div>
		    
            <div class="col-md-10 center-part ">
            	<?php
            		if(isset($_GET['id'])) {
				    	$pageId = $_GET['id'];
				    } else {
				    	$pageId = 1;
				    }
				    $ownerId = $_SESSION['owner-id'];
				    $countedRows = countProducts("ads", $ownerId, "Waiting Approval");//counts ads in table
				    $prodOnPage = 2;

				    $pages = ceil($countedRows["countedProd"]/$prodOnPage);
				    
				    
				    // getAdStatus
				    $ads=showMyAds($ownerId, $prodOnPage, $pageId, "Waiting Approval");
				     
				    //echo count($myAds);
                    for($i=0; $i<count($ads); $i++){
                    	$cat = getCategory(intval($ads[$i]['ad_category']));
                    	 $town = getTown(intval($ads[$i]['ad_town']));

		 echo '<div class=" row add-design bordered my-ads-center-side " >
		       
                 <div class="ad-wrap col-md-9" >
					  <div class="heading-and-date ">
					   
						<h1>'.$ads[$i]['ad_title'].'</h1>
						<span class="my-date"> '.$ads[$i]['ad_date'].'</span>
					  </div>

					  <div class="s-row">
						<div class="picture">
							<img src=img/'.$ads[$i]['ad_image'].' >
						</div>
						<div class="ad-content">
							<div class="ad-data">
								<p>'.$ads[$i]['ad_text'].'</p>
							</div>
							<div class="user-data">
								<span>Category:</span>
								<span>'.$cat[$i]['category_name'].'</span>
							</div>
							<div class="user-data">
								<span>Town:</span>
								<span>'.$town[$i]['town_name'].'</span>
							</div>
							
						</div>

					  </div>
				 </div>	

				 <div class="status col-md-3">
				  		<span>Status:</span>
				  		<span class="st text-center">'.$ads[$i]['ad_status'].'</span>
				  		<a href="delete-my-ad.php?id='.$ads[$i]['ad_id'].'">Delete </a>
				  		<a href="edit-my-ad.php?id='.$ads[$i]['ad_id'].'" class="edit-my-ad" style="text-align:center; "> Edit</a>
				 </div>
			
				
			</div>'
				;}

             if($pageId-1 > 0){
			    	$prev = $pageId-1;
			    } 
			    else {
			    	$prev = 1;
			    }

			    $currentPage=$pageId; //
			    $fromPage=$currentPage-5;
			   
			    if($fromPage<1){
			    	$fromPage=1;
			    }
			    $toPage=$fromPage+5;

			    if($toPage>$pages){
			    	$toPage=$pages;
			    }
					    
					  
					echo '  <div class=" paging my-pagination  ">
				  	     <ul class="pagination ">
					    <li class="page-item" >
					      <a class="page-link" href="for-approval.php?id=1" >First</a>
					    </li>
					    <li class="page-item">
					      <a class="page-link" href="for-approval.php?id='.$prev.'">Previous</a>
					    </li>
					    ';
					    for($i = $fromPage; $i <=$toPage; $i++) {
					    	
					    		echo '<li class="page-item">
									      <a class="page-link" href="for-approval.php?id='.$i.'">'.$i.'</a>
									    </li>';
					    	
					    }
					    if($pageId+1 <= $pages){
					    	$next = $pageId+1;
					    } else {
					    	$next = $pages;
					    }
					    echo '
					    <li class="page-item">
					      <a class="page-link" href="for-approval.php?id='.$next.'">Next</a>
					    </li>
					    <li class="page-item">
					      <a class="page-link" href="for-approval.php?id='.$pages.'">Last</a>
					    </li>
				  </ul>
				</div>'; 
				  ?>	
			</div>         
		</div>
	    <footer id="footer">
	    	<nav class="navbar bg-primary">
			  	<p class="text-center">
			  		&#169; 2018 by Yavor Zhekov & Miro Zhekov - AMWAY, No Rights Reserved.
			  	</p>
			</nav>
	     </footer>
	</div>
<script src="js/functions.js"></script>
<script> 
	var pageId= <?php echo json_encode($pageId); ?>;
	$(".pagination li").each(function(){
		if($(this).children("a").html()==pageId){
           $(this).children("a").css("background", "#6FAB46");
		}
	})
</script>
</body>
</html>
