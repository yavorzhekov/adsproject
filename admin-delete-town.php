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
  	
  	div.category form fieldset div a input
  	{
  	width:25%;	
    margin-left: 8%;
    min-width:50%
	max-width: 100%;
  	display: inline-block;
	background: #6fab46;
	font-size: 20px;
	color: #fff;
	border-radius: 10px;
	padding: 4px 30px;
	border: 1px solid #507e32;
	
  	}
  	
  </style>
</head>
<body>

	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Ads Administration - Delete Town</h1>
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
					    <a href="admin-view-categories.php" >Categories</a>
					  </li>
					  <li>
					    <a href="admin-view-towns.php">Towns</a>
					  </li>
					</ul>
				  </nav>
				</div>
				

                
			</div>
		    <div class="col-md-3"></div>
            <div class="col-md-4 center-part">
		      <div class=" row add-design bordered" style="padding-bottom:10px;">
                 <div class="category ">
                 	<div>
                 	   	 <h1 class="text-center">Confirm Deleting Town ?</h1>
                 	   	 <div class="line" style="width:85%;"></div>
                     </div>
                 	 <form action="delete-town.php?id=<?php echo $_GET['id']; ?>" method="POST">
                         <fieldset>
                           <div class="form-group">
	                           <label for="town">Town:</label>
	                           <span  id="town"> <?php echo $_GET['town_n']; ?> </span>
                           </div>
                           
                           <div style="margin-left:45px;">
	                            <a><input type="submit" class=" btn btn-primary " value="Delete" ></a>
						         <a><input type="button" class=" btn btn-primary " onclick="location.replace('admin-view-towns.php')" value="Cancel"></a>
							   	
						   </div>
                         </fieldset>
                     </form>
					   
			     </div>	 
			</div>
			</div>
				<div class="col-md-3"></div>
				
				
			  	         
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
