<?php  
include 'db.php'; 
include 'functions.php';
session_start(); ?>
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
  div.heading-and-date span.my-date{
  	width:100% !important;
  	margin:100%;
  	color:red;
  }
  	
  </style>
</head>
<body>

	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Ads Administration - Delete Ad</h1>
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
					    <a href="admin-ads.php">Ads</a>
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
				

                
			</div>
		    
            <div class="col-md-8 center-part ">
            	
              
		      <div class=" row add-design bordered my-ads-center-side " >
		        
                    <form action="delete-ad.php?id=<?php echo $_GET['id'];?>" method="POST">
		             <fieldset>
			      	<?php
			      	$id=$_GET['id'];
			      	$adInfo=adInfo2($id);
			      	
			         echo '	
	                   <div class="ad-wrap" >
	                 	  <div>
	                 	  	<h1 class="text-center" style="margin:20px 0; color:#000; font-weight:bold;
	                 	  	"> Confirm Deleting Ad ?</h1>
	                 	  	<div class="line"></div>
	                 	  </div>
						  <div class="heading-and-date ">
						   
							<h1>'.$adInfo[0]['ad_title'].'</h1>
							<span class="my-date">'.$adInfo[0]['ad_date'].'</span>
						  </div>

						  <div class="s-row">
							<div class="picture">
								<img src="img/'.$adInfo[0]['ad_image'].'" >
							</div>
							<div class="ad-content">
								<div class="ad-data">
									<p>'.$adInfo[0]['ad_text'].'</p>
								</div>
								<div class="user-data">
									<span class="firstspan">Username:</span>
									<span>'.$adInfo[0]['member_username'].'</span>
								</div>
								<div class="user-data">
									<span class="firstspan" >Name:</span>
									<span>'.$adInfo[0]['member_name'].'</span>
								</div>
								
								<div class="user-data">
									<span class="firstspan">Email:</span>
									<span>'.$adInfo[0]['member_email'].'</span>
								</div>
								<div class="user-data">
									<span class="firstspan">Tel:</span>
									<span>'.$adInfo[0]['member_phone'].'</span>
								</div>
								<div class="user-data">
									<span class="firstspan">Category:</span>
									<span>'.$adInfo[0]['category_name'].'</span>
								</div>
								<div class="user-data">
									<span class="firstspan">Town:</span>
									<span>'.$adInfo[0]['town_name'].'</span>
								</div>


								  
							';
								
								?>
								 <section style=" margin-top:50px;">
								   	<a><input type="submit" class=" btn btn-primary " value="Delete" style="margin-right:5%; margin-left:10%;" ></a>
						            <a><input type="button" class=" btn btn-primary " onclick="history.go(-1);" value="Cancel"></a>
								</section>
							  </div>
							 </div>
                             </fieldset>

						  </form>
						</div>
						
					   </div>
					   
				 
			</div>
			
				<div class="col-md-2"></div>
				
				         
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
</body>
</html>
