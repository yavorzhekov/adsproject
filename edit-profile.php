<?php session_start(); 
include 'db.php'; 
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
  	<script src="js/jquery-3.3.1.min.js"></script>
  <style >
  	div#main-content{
  		margin-bottom:40px;
  	}
  	div.bordered{
  		border:1px solid #507e32;
  	}
  	

  </style>
</head>
<body>

	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Edit User Profile</h1>
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
		<section class="row"></section>
		<section class="col-md-12">  
			<?php 
					if(isset($_GET['mess'])) {
						if($_GET['mess'] == 'profileChanged'||$_GET['mess']=='PassChanged') {
							echo '
							        
							        <div class=" my-alert1 col-md-10 alert alert-dismissible alert-success btn-close" style="margin-left:200px; height:50px;">
							          <button type="button" class="close hiding" data-dismiss="alert"style="border:1px solid
						                         black; height:100%; width:50px;">&times;</button>
							          <strong>User profile successfully changed. </strong>
							        </div>
							        <div class="col-md-2"></div>
							  ';

						}
					}
				 ?>
				 <script>
				 	$('.hiding').click(function() {
				 		$('.btn-close').hide();
				 	});
				 </script>
				 </section> 

			<div class="col-md-1"></div>
			<div class="col-md-2 left-part" style="margin-left:-50px;">
				<div class="card mb-3 bordered" style="margin-bottom:30px;" >
				  <h1 class="text-center">Navigation</h1>
				  <div class="line"></div>
				  <nav id="left-nav">
				  	<ul>
					  <li>
					    <a href="index.php">Home</a>
					  </li>
					  <li>
					    <a href="my-ads.php">My Ads</a>
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
                
			</div>
			<div class="row">
			
				 </div>
				     <div class=" col-md-4 my-form " >
						<h1 class="text-center" style="margin-top:10px;" >Edit Profile</h1>
						<div class="line"></div>
	                    <form action="profile-change.php" method="POST"  name="registration">
						  <fieldset >
						    <div  > <!-- first 4 inputs -->
							  <?php
							  $userDetails=userInfo();
							    echo '<div class="form-group">
							      <label for="exampleInputEmail1">Email</label>
							      <input type="email" class="form-control" name="email" 
							      value="'.$userDetails[0]['member_email'].'" id="exampleInputEmail1" aria-describedby="emailHelp" required>
							    </div>
							    
							    <div class="form-group">
							      <label for="text1-input">Name</label>
							      <input type="text" class="form-control" name="myname"id="text1-input" 
							      value="'.$userDetails[0]['member_name'].'" required>
						        </div>
						       <div class="form-group">
							      <label for="my-phone">Phone</label>
							      <input type="text" class="form-control" name="phone" id="my-phone"
							       value="'.$userDetails[0]['member_phone'].'" required>
							   </div> ';
							  ?>
							    <div class="form-group">
							      <label for="exampleSelect1" style="display: block">Town</label>
							      <?php
							      $towns=showTowns();
							       echo '<select  id="exampleSelect1" name="towns">';
		                            for ($i=0; $i<count($towns); $i++){
		                            	echo' <option>'.$towns[$i]['town_name'].'</option>';
							     
		                            }
		                             echo '</select>';
							      ?>
							    </div> 
							    <button type="submit" class=" btn btn-primary">Update</button>
						        <button type="submit" class=" btn btn-primary" onclick="history.back();">Cancel</button>
							</div> 
						  </fieldset>
						</form>
					</div>
			        <div class=" col-md-4 my-form " >
						<h1 class="text-center" style="margin-top:10px;" >Change Password</h1>
						<div class="line"></div>
	                    <form action="pass-change.php" method="POST"  name="registration" onsubmit="return checkData()">
						  <fieldset >
						    <div > <!-- first 4 inputs -->
							  	
							    <div class="form-group">
							      <label for="exampleInputPassword1">Old Password</label>
							      <input type="password" class="form-control" name="oldpass" id="exampleInputPassword2" placeholder="Password" required>
							    </div>
							    
							     <div class="form-group">
							      <label for="exampleInputPassword1">New Password</label>
							      <input type="password" class="form-control" name="newpass" id="exampleInputPassword1" placeholder="Password" required>
							    </div>
						        <div class="form-group">
							      <label for="exampleInputPassword1">Confirm new Password</label>
							      <input type="password" class="form-control" name="confpass" id="exampleInputPassword1" placeholder="Password" required>
							    </div>
							    <button type="submit" class=" btn btn-primary">Change password</button>
						        <button type="submit" class=" btn btn-primary" onclick="history.back();">Cancel</button>
							    
							</div> 
						  </fieldset>
						</form>
			       </div>
			       <div class="col-md-1"></div>
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

