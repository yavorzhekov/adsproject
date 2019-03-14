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
  	<script src="js/jquery-3.3.1.min.js"></script>
  <style >
  	div#main-content{
  		margin-bottom:40px;
  	}
  	nav#left-nav ul li a{
  	background:#daa600;border:1px solid #7f6000;
    }
  </style>
</head>
<body>
    <!-- <?php  
           // $sql = "SELECT * FROM towns";
           // $query = mysqli_query($linkDB, $sql);
           // $row = null;
           // while($res = mysqli_fetch_assoc($query)) {
           //   $row [] = $res;
           // echo count($row);
           // echo '<pre>';
           // echo print_r($row); 
           // echo '</pre>';
        ?>   -->
	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1>Ads - Registration</h1>
			</nav>
	  <!-- End of Header -->
		</header>
		<div class="row" id="main-content">
			<div class="col-md-3 left-part">
				<div class="card mb-3" style="margin-bottom:30px;" >
				  <h1 class="text-center">Navigation</h1>
				   <div class="line"></div>
				  <nav id="left-nav">
				  	<ul>
					  <li>
					    <a href="index.php">Home</a>
					  </li>
					  
					</ul>
				  </nav>
				</div>

				<div class="card mb-3 login-register" style="margin-top:30px;">
				  <p class="text-center">To publish a new ad, please login.</p>
				  <a href="login.php" class="btn my-button">Login</a>
				  <a href="register.php" class="btn my-button">Register</a>
				</div>
				
			</div>
			<div class="col-md-6">
				<?php 
					if(isset($_GET['mess'])) {
						if($_GET['mess'] == 'sr') {
							echo '<div class="my-alert1 alert alert-dismissible alert-success btn-close">
							  <button type="button" class="close hiding" data-dismiss="alert"style="border:1px solid black; height:100%; width:50px;">&times;</button>
							  <strong>User account created. Please login!</strong>
							</div>';
						}
					}
				 ?>
				 <script>
				 	$('.hiding').click(function() {
				 		$('.btn-close').hide();
				 	});
				 </script>
				<div class="my-form " >
					<h1 class="text-center" style="margin-top:10px;" >User registration</h1>
					<div class="line"></div>
                    <form action="registration.php" method="POST"  name="registration" onsubmit="return checkData()">
					  <fieldset >
					    <div class="f-4 col-md-6 "  > <!-- first 4 inputs -->
						  	<div class="form-group">
						      <label for="text-input">Usename</label>
						      <input type="text" class="form-control" name="username" id="text-input"  placeholder="Username" required>
						    </div>
						    <div class="form-group">
						      <label for="exampleInputEmail1">Email</label>
						      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
						     
						    </div>
						    <div class="form-group">
						      <label for="exampleInputPassword1">Password</label>
						      <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password" required>
						    </div>
						    <div class="form-group">
						      <label for="text1-input">Name</label>
						      <input type="text" class="form-control" name="myname"id="text1-input" placeholder="Name" required>

					        </div>
					        <button type="submit" class=" btn btn-primary">Submit</button>
						</div>
						<div class="l-3 col-md-6  "><!--  Last 3 inputs -->
						    <div class="form-group">
						      <label for="exampleInputPassword1">Confirm Password</label>
						      <input type="password" class="form-control" name="conf-pass" id="exampleInputPassword2" placeholder="Password" required>
						    </div>
						    <div class="form-group">
						      <label for="my-phone">Phone</label>
						      <input type="text" class="form-control" name="phone" id="my-phone" placeholder="Enter phone" required>
						    </div>
						    <div class="form-group">
						      <label for="exampleSelect1" style="display: block">Town</label>
						      <?php
						      $towns=showTowns();
						       echo '<select  id="exampleSelect1" name="towns">';
	                            for ($i=1; $i<count($towns); $i++){
	                            	echo' <option>'.$towns[$i]['town_name'].'</option>';
						     
	                            }
	                             echo '</select>';
						      ?>
						    </div> 
						    
					    	<a href="login.php"class=""> Login here</a>
					    </div>
					    
					  </fieldset>
					</form>
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