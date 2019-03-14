<?php  
session_start();
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
   div.my-form{
   	margin-top:10px;


   }
  div.my-form form fieldset div span{
  	    background: #c5e0b4;
		border: 2px dotted #a9d18e;
		width: 90%;
		padding:5px;
		min-width: 48%;
		font-size: 20px;
		display:block;
		margin-top:5px
}
div.my-form form fieldset div input, select{
	width:90%;
}
div.bordered div.line{
	width:69%;
}
div.my-form form fieldset div div.edit-user-btns button{
  	display: inline-block;
	background: #6fab46;
	font-size: 20px;
	color: #fff;
	border-radius: 10px;
	margin:10px;
	border: 1px solid #507e32;
	overflow-wrap: break-word;
  	}

  </style>
</head>
<body>

	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Ads Administration - Edit User</h1>
			  	<?php
			  	if(isset($_SESSION['username'])) {
                echo "<span class='col-md-1 text-right'>". $_SESSION['username']."</span>".
                '<a href="logout.php" title="login or register" class="col-md-1 text-right">Logout</a>';
                 
           		 }
           		 if(isset($_GET['id']))
                ?>
			</nav>
	  <!-- End of Header -->
		</header>
		<div class="row" id="main-content">
			<div class="col-md-2 left-part"  >
				<div class="card mb-3 bordered" style="margin-bottom:10px; " >
				  <h1 class="text-center">Navigation</h1>
				  <div class="line" ></div>
				  <nav id="left-nav">
				  	<ul>
					  <li>
					    <a href="admin-ads.php">Ads</a>
					  </li>
					  <li>
					    <a href="admin-view-users.php" style="background: #daa600;">Users</a>
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
		    
				     <div class=" col-md-4 my-form " >
						<h1 class="text-center" style="margin-top:10px;" >Edit Profile</h1>
						<div class="line"></div>
	                    <form action="admin-profile-change.php?id=<?php echo $_GET['id']; ?>" method="POST"  name="registration">
						  <fieldset >
						    <div  style="margin-left:30px;"> <!-- first 4 inputs -->
							    <div class="form-group">
							     <?php
							     $users=getAllUsers();
							     
							    $i=$_GET['id']-1;
							    echo $i;
	                           	 echo '<label for="username">Username:</label>
	                          	 <span  id="username"> '.$users[$i]['member_username'].' </span>
                                </div>
							    
							    <div class="form-group">
							      <label for="text1-input">Name:</label>
							      <input type="text" class="form-control" name="myname"id="text1-input" 
							      value="'.$users[$i]['member_name'].'" required>
						        </div>
						       <div class="form-group">
							      <label for="my-email">Email:</label>
							      <input type="text" class="form-control" name="email" id="my-email"
							       value="'.$users[$i]['member_email'].'" required>
							   </div> 
							   <div class="form-group">
							      <label for="my-phone">Phone:</label>
							      <input type="text" class="form-control" name="phone" id="my-phone"
							       value="'.$users[$i]['member_phone'].'" required>
							   </div> ';
							    
							   ?>
							    <div class="form-group">
							      <label for="exampleSelect1" style="display: block">Town</label>
							      <?php
							      $towns=showTowns();
							       echo '<select  id="exampleSelect1" name="towns" style="width:90%;">';
		                            for ($i=1; $i<count($towns); $i++){
		                            	echo' <option>'.$towns[$i]['town_name'].'</option>';
							     
		                            }
		                             echo '</select>';
							      ?>
							    </div> 
							    <div class="form-group check-box">
							      <input type="checkbox" name="" style="width:5%; height:20px;">
							      <strong style="margin-left:20px">Is Administrator ?</strong> 
							    </div>
							   <div class="edit-user-btns">
							    <button type="submit" class=" btn btn-primary">Update</button>
						        <button type="submit" class=" btn btn-primary" onclick="history.back();">Cancel</button>
                               </div>
							</div> 
						  </fieldset>
						</form>
					</div>
			        <div class=" col-md-4 my-form "style="height:410px;">
						<h1 class="text-center" style="margin-top:10px;" >Change User Password</h1>
						<div class="line"></div>
	                    <form action="admin-change-pass.php?id=<?php echo $_GET['id']; ?>" method="POST"  name="registration" onsubmit="return checkData()">
						  <fieldset >
						    <div style="margin-left:30px;" >  
							  	<?php
							  	$users=getAllUsers();
							    $i=$_GET['id']-1;
							     echo '<div class="form-group">
	                           	 <label for="username">Username:</label>
	                          	 <span  id="username"> '.$users[$i]['member_username'].'</span>
                                </div>';
							    ?>
							    
							     <div class="form-group">
							      <label for="exampleInputPassword1">New Password:</label>
							      <input type="password" class="form-control" name="newpass" id="exampleInputPassword1" placeholder="Password" required>
							    </div>
						        <div class="form-group">
							      <label for="exampleInputPassword2">Confirm new Password:</label>
							      <input type="password" class="form-control" name="confpass" id="exampleInputPassword2" placeholder="Password" required>
							    </div>
							    <div class="edit-user-btns">
								  <button type="submit" class=" btn btn-primary">Change password</button>
							      <button type="submit" class=" btn btn-primary" onclick="history.back();">Cancel</button>
							    </div>
							</div> 
						  </fieldset>
						</form>
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
