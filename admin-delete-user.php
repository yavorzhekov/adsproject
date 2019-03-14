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
  	div.add-design form fieldset section a input
  	{
  	min-width:50%
	max-width: 100%;
	display: inline-block;
	background: #6fab46;
	font-size: 20px;
	color: #fff;
	border-radius: 10px;
	padding:5px 20px;
	border: 1px solid #507e32;
	margin-right: 5%;
	
  	}
  	div.add-design form fieldset  div.s-row{
  		margin-left:7%;
  	}
  	div.add-design form fieldset div.s-row div.user-data>span:first-child {
		font-size: 19px;
		display: block;
		width: 20%;
		margin-top:15px;

	}
    div.add-design form fieldset   div.s-row div.user-data>span:last-child {
		background: #c5e0b4;
		border: 2px dotted #a9d18e;
		width: 85%;
		padding:5px;
		min-width: 48%;
		font-size: 20px;
		display:block;
		margin-top:5px;
		}
  </style>
</head>
<body>

	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Ads Administration - Delete User</h1>
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
			<div class="col-md-2"></div>
		    
            <div class="col-md-4 center-part ">
            	
              
		      <div class=" row add-design bordered  my-ads-center-side  " >
		      	<form action="delete-user.php?id=<?php echo $_GET['id'];?>" method="POST">
		      	   <fieldset>
                      <div>

                 	  	<h1 class="text-center" style="margin:20px 0; color:#000; font-weight:bold;
                 	  	"> Confirm Deleting User ?</h1>
                 	  	<div class="line"></div>
                 	  </div>
                 <?php
                   $id=$_GET['id'];
                   $delUser= getCurrentUser($id);
                  
					 echo' <div class="s-row">
							<div class="user-data">
								<span>Username:</span>
								<span>'.$delUser[0]['member_username'].'</span>
							</div>
							<div class="user-data">
								<span>Name:</span>
								<span>'.$delUser[0]['member_name'].'</span>
							</div>
							
							<div class="user-data">
								<span>Email:</span>
								<span>'.$delUser[0]['member_email'].'</span>
							</div>
							<div class="user-data">
								<span>Phone:</span>
								<span>'.$delUser[0]['member_phone'].'</span>
							</div>
							<div class="user-data">
								<span>Town:</span>
								<span>'.$delUser[0]['member_town'].'</span>
							</div>
							<p class="conf-delete-text">Deleting the user will also delete all ads, created by this user!</p>
						
					   </div>';
					   ?>
					   <section class="text-center" style="margin-left:25px; margin-top:50px; ">
					   	  <a><input type="submit" class=" btn btn-primary " value="Delete" ></a>
						  <a><input type="button" class=" btn btn-primary " onclick="location.replace('admin-view-users.php')" value="Cancel"></a>
					   </section>
				 </fieldset>
				</form>
			</div>
			</div>
				<div class="col-md-4"></div>
				
				
			  	         
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
