<?php  
include 'db.php'; 
include 'functions.php'; 
session_start();?>
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
  #header > nav{
  	background:#daa600 !important;
  }
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
<?php 
	 
 ?>
	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Ads Administration - Ads</h1>
			  	<?php
			  	if(isset($_SESSION['username'])) {
			  		if($_SESSION['username'] == 'my-admin') {
	                echo "<span class='col-md-1 text-right'>". $_SESSION['username']."</span>".
	                '<a href="logout.php" title="login or register" class="col-md-1 text-right">Logout</a>';
	                 
	           		 }
	           		 else {
           		 		header('location:index.php');
           		 	}
           		 }
           		 else {
           		 		header('location:index.php');
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
					    <a href="admin-ads.php"  style="background: #daa600;">Ads</a>
					  </li>
					  <li>
					    <a href="admin-view-users.php">Users</a>
					  </li>
					  <li>
					    <a href="admin-view-categories.php">Categories</a>
					  </li>
					  <li>
					    <a href="admin-view-towns.php">Towns</a>
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
					    <a href="admin-ads.php">All</a>
					  </li>
					  <li>
					    <a href="admin-published-ads.php">Published</a>
					  </li>
					  <li>
					    <a href="admin-waiting-ads.php"style="background: #daa600;">Waiting Approval</a>
					  </li>
					  <li>
					    <a href="admin-inactive-ads.php">Inactive</a>
					  </li>
					  <li>
					    <a href="admin-rejected-ads.php" >Rejected</a>
					  </li>
					</ul>
				  </nav>
				</div>

                
			</div>
		    
             
            <div class="col-md-8 center-part ">
            	


		      <?php  
		      if(isset($_GET['id'])) {
				    	$pageId = $_GET['id'];
				    } else {
				    	$pageId = 1;
				    }
				    $townId = 0;
	                $catId = 0;
	                if(isset($_GET['catId']) || isset($_GET['townId'])){
	 	               $townId = $_GET['townId'];
	 	               $catId = $_GET['catId'];
            	    }

            	    
				    $adsOnPage = 1;
				   

				    if ($catId==0 && $townId==0){
            	    	$adStatus=adInfo($adsOnPage, $pageId, "Waiting Approval");
            	    	 $ads=getAdStatus("Waiting Approval");
				         $pages=count($ads);
				        

            	    }

            	    else {
            	    	$adStatus=adInfo4($adsOnPage, $pageId, $townId, $catId, "Waiting Approval");
            	    	$ads=countAds("Waiting Approval", $townId, $catId);
            	    	$pages=count($ads);
            	    	}
		      if(empty($adStatus) != 1){
			    foreach($adStatus as $key) {         	
		      echo '
                 <div class=" row add-design bordered my-ads-center-side admin-panel" >
		      	<div class="ad-wrap" >
					  
					  <div class="heading-and-date ">
					   
						<h1>'.$key['ad_title'].'</h1>
						<span class="my-date"> '.$key['ad_date'].'</span>
					  </div>

					  <div class="s-row">
						<div class="picture">
							<img src="img/'.$key['ad_image'].'" >
						</div>
						<div class="ad-content">
							<div class="ad-data">
								<p>'.$key['ad_text'].'</p>
							</div>
							<div class="user-data">
								<span>Username:</span>
								<span>'.$key['member_username'].'</span>
							</div>
							<div class="user-data">
								<span>Name:</span>
								<span>'.$key['member_name'].'</span>
							</div>
							
							<div class="user-data">
								<span>Email:</span>
								<span>'.$key['member_email'].'</span>
							</div>
							<div class="user-data">
								<span>Tel:</span>
								<span>'.$key['member_phone'].'</span>
							</div>
							<div class="user-data">
								<span>Category:</span>
								<span>'.$key['category_name'].'</span>
							</div>
							<div class="user-data">
								<span>Town:</span>
								<span>'.$key['town_name'].'</span>
							</div>
							<div class="user-data">
				  		       <span>Status:</span>
				  		       <span class="st">'.$key['ad_status'].'</span>
				            </div>
						</div>
						
					   </div>
					   <div class="line"></div>
					   <div class="four-btns">
					      
						  <a href="admin-edit-ad.php?id='.$key['ad_id'].'"><button type="submit" class=" btn btn-primary ">Edit </button></a>
						  <a href="reject-ad.php?id='.$key['ad_id'].'"><button type="submit" class=" btn btn-primary " >Reject</button></a>
						  <a href="admin-delete-ad.php?id='.$key['ad_id'].'"><button type="submit" class=" btn btn-primary " >Delete</button></a>
						  <a href="admin-approve-ad.php?id='.$key['ad_id'].'"><button type="submit" class=" btn btn-primary " >Publish</button></a>
					   </div>
					 </div> 
			</div> ';
				 
				}}
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
            echo '   <div class=" paging my-pagination  ">
				  	     <ul class="pagination ">
					    <li class="page-item" >
					      <a class="page-link" href="admin-waiting-ads.php?catId='.$catId.'&townId='.$townId.'&id=1" >First</a>
					    </li>
					    <li class="page-item">
					      <a class="page-link" href="admin-waiting-ads.php?catId='.$catId.'&townId='.$townId.'&id='.$prev.'">Previous</a>
					    </li>
					    ';
					    for($i = $fromPage; $i <=$toPage; $i++) {
					    	
					    		echo '<li class="page-item">
									      <a class="page-link" href="admin-waiting-ads.php?catId='.$catId.'&townId='.$townId.'&id='.$i.'">'.$i.'</a>
									    </li>';
					    	
					    }
					    if($pageId+1 <= $pages){
					    	$next = $pageId+1;
					    } else {
					    	$next = $pages;
					    }
					    echo '
					    <li class="page-item">
					      <a class="page-link" href="admin-waiting-ads.php?catId='.$catId.'&townId='.$townId.'&id='.$next.'">Next</a>
					    </li>
					    <li class="page-item">
					      <a class="page-link" 
					      href="admin-waiting-ads.php?catId='.$catId.'&townId='.$townId.'&id='.$pages.'">Last</a>
					    </li>
				  </ul>
				</div>'; 
				 ?>
				 

				
			</div>
			<div class="col-md-2 right-part" style="margin-left:-7%;">
				<div class="card mb-3 bordered">
				  <h1 class="text-center">Categories</h1>
				  <div class="line"></div>
				  <!--<nav id="right-nav" style="height: 25%; overflow: hidden; margin-bottom:20px; ">
					<a href="#" style="font-size:18px;" id="categories">+Show all categories</a>-->
				  	<nav id="right-nav" class="categCats" style="height:25%; overflow: auto;">
				  	<ul>
					  <?php 
					  		$categories = showCategories();
					  		for($i = 0; $i < count($categories); $i++) {
					  			
					  			echo '<li><a href="'.$_SERVER['PHP_SELF'].'?catId='.$categories[$i]['category_id'].'&townId='.$townId.'" catId="'.$categories[$i]['category_id'].'"  >' .$categories[$i]['category_name'].' </a></li>';

					  		}

					   ?>
					</ul>
					
				  </nav>
				</div>

                 
                 <div class="card mb-3 bordered" style="margin-top:30px;" >
				  <h1 class="text-center">Towns</h1>
				 <div class="line"></div>
				  <!--<nav id="right-nav" style="height: 25%; overflow: hidden; margin-bottom:20px;">
					<a href="#" style="font-size:18px;" id="towns">+Show all towns</a>-->
				  	<nav id="right-nav" class="townsCats" style="height:25%; overflow: auto;">
				  	<ul>
					  <?php 
					  		$towns = showTowns();
					  		for($i = 0; $i < count($towns); $i++) {
					  			echo '<li><a href="'.$_SERVER['PHP_SELF'].'?catId='.$catId.'&townId='.$towns[$i]['town_id'].'" townId="'.$towns[$i]['town_id'].'">'.$towns[$i]['town_name'].'</a></li>';		
					  		}
					   ?>
					</ul>
				  </nav>
				</div>


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
	var townId = <?php echo json_encode($townId); ?>;
	var catId = <?php echo json_encode($catId); ?>;

	$(".categCats ul li a[catid="+catId+"]").addClass("selCateg");
	$(".townsCats ul li a[townid="+townId+"]").addClass("selTown");
	var pageId= <?php echo json_encode($pageId); ?>;
	$(".pagination li").each(function(){
		if($(this).children("a").html()==pageId){
           $(this).children("a").css("background", "#6FAB46");
		}
	})
</script>
</body>
</html>
