<?php session_start();
include 'functions.php'; ?>
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
  	}
  	div.my-pagination{
  	width:520px !important;
  	position:relative;
	left: calc(50% - 520px / 2);
     }
  	
  </style>
</head>
<body>

	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Ads - Home</h1>
			  	<?php
			  	if(isset($_SESSION['username'])) {
			  		if($_SESSION['username'] == 'my-admin') {
			  			header('location: admin-ads.php');
			  		}
                echo "<span class='col-md-1 text-right'>". $_SESSION['username']."</span>".
                '<a href="logout.php" title="login or register" class="col-md-1 text-right">Logout</a>';
                 
           		 }
                ?>
			</nav>
	  <!-- End of Header -->
		</header>
		<div class="row" id="main-content">
			<!-- <div class="col-md-1"></div> -->
			<div class="col-md-2 left-part"  >
				<div class="card mb-3 bordered" style="margin-bottom:30px;" >
				  <h1 class="text-center">Navigation</h1>
				  <div class="line"></div>
				  <nav id="left-nav">
				  	<ul>
					  <li>
					    <a href="index.php" style="background: #daa600;">Home</a>
					  </li>
					  <?php
					  if(isset($_SESSION['username'])){
					  echo '<li>
					    <a href="my-ads.php">My Ads</a>
					  </li>
					  <li>
					    <a href="new-ad.php">Publish New Ad</a>
					  </li>
					  <li>
					    <a href="edit-profile.php">Edit Profile</a>
					  </li>';
					   }
					  ?>
					</ul>
				  </nav>
				</div>
                <?php
                if(!isset($_SESSION['username'])){
                echo'
				<div class="card mb-3 login-register bordered" style="margin-top:30px;">
				  <p class="text-center">To publish a new ad, please login.</p>
				  <a href="login.php" class="btn my-button">Login</a>
				  <a href="register.php" class="btn my-button">Register</a>
				</div>';
			     }
				?>
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

            	    
				    $adsOnPage = 2;
				   

				    if ($catId==0 && $townId==0){
            	    	$adStatus=adInfo($adsOnPage, $pageId, "Published");
            	    	 $ads=getAdStatus("Published");
				         $pages=ceil(count($ads)/$adsOnPage);
				        

            	    }

            	    else {
            	    	$adStatus=adInfo4($adsOnPage, $pageId, $townId, $catId, "Published");
            	    	$ads=countAds("Published", $townId, $catId);
            	    	$pages=ceil(count($ads)/$adsOnPage);
            	    	}
		      if(empty($adStatus) != 1){
			    foreach($adStatus as $key) {      
				echo '
				<div class="add-design bordered">
				 <div class="heading-and-date ">				  
					<h1>'.$key['ad_title'].'</h1>
					<span class="my-date">'.$key['ad_date'].'</span>
				  </div>

				  <div class="s-row">
					<div class="picture">
						<img src="img/'.$key['ad_image'].'"  >
					</div>
					<div  class="ad-content">
						<div class="ad-data">
							<p>'.$key['ad_text'].'</p>
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
							<span>Tel.:</span>
							<span>'.$key['member_phone'].'</span>
						</div>
					</div>
				  </div>			  
				   
				</div>';
				}
			}
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
            echo '  <div class="paging my-pagination">
				  	     <ul class="pagination">
					    <li class="page-item" >
					      <a class="page-link" href="index.php?catId='.$catId.'&townId='.$townId.'&id=1" >First</a>
					    </li>
					    <li class="page-item">
					      <a class="page-link" href="index.php?catId='.$catId.'&townId='.$townId.'&id='.$prev.'">Previous</a>
					    </li>
					    ';
					    for($i = $fromPage; $i <=$toPage; $i++) {
					    	
					    		echo '<li class="page-item">
									      <a class="page-link" href="index.php?catId='.$catId.'&townId='.$townId.'&id='.$i.'">'.$i.'</a>
									    </li>';
					    	
					    }
					    if($pageId+1 <= $pages){
					    	$next = $pageId+1;
					    } else {
					    	$next = $pages;
					    }
					    echo '
					    <li class="page-item">
					      <a class="page-link" href="index.php?catId='.$catId.'&townId='.$townId.'&id='.$next.'">Next</a>
					    </li>
					    <li class="page-item">
					      <a class="page-link" 
					      href="index.php?catId='.$catId.'&townId='.$townId.'&id='.$pages.'">Last</a>
					    </li>
				  </ul>
				</div>'; 
					  
		   ?>
		</div>


				
			<!-- </div> -->
			<div class="col-md-2 right-part">
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
	<script>
	var townId = <?php echo json_encode($townId); ?>;
	var catId = <?php echo json_encode($catId); ?>;
	$(".categCats ul li a[catid="+catId+"]").addClass("selCateg");
	$(".townsCats ul li a[townid="+townId+"]").addClass("selTown");

	// $( ".my-pagination ul li а").addClass("paginationColor");

	var pageId= <?php echo json_encode($pageId); ?>;
	$(".pagination li").each(function(){
		if($(this).children("a").html()==pageId){
           $(this).children("a").css("background", "#6FAB46");
		}
	})
	//$('.my-pagination ul li а').click(function(){
   // $(this).addClass('paginationColor');

// });
  



</script>

</body>
</html>


