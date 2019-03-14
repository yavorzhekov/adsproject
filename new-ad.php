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
  	input#image + label {
	  	max-width: 100%;
		display: inline-block;
		background: #6fab46;
		font-size: 20px;
		color: #fff;
		border-radius: 10px;
		margin: 0 auto 20px auto;
		padding: 10px 0;
		border: 1px solid #507e32;
		overflow-wrap: break-word;
		cursor:pointer;
		position: absolute;
		right:19%;
  	}
  	input#res {
  		width: 50%;
  	}

  </style>
</head>
<body>

	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Publish New Ad</h1>
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
			<div class="col-md-1" > </div>
			<div class="col-md-3 left-part" style="margin-left:-50px;" >
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
					    <a href="new-ad.php" style="background:#daa600;">Publish New Ad</a>
					  </li>
					  <li>
					    <a href="edit-profile.php">Edit Profile</a>
					  </li>
					</ul>
				  </nav>
				</div>
                
			</div>
		    <section class="row">  
			    <?php 
					if(isset($_GET['mess'])) {
						if($_GET['mess'] == 'published') {
							echo '
							        
							        <div class=" my-alert1 col-md-10 alert alert-dismissible alert-success btn-close" style="margin-left:200px; height:50px;">
							          <button type="button" class="close hiding" data-dismiss="alert"style="border:1px solid black; height:100%; width:50px;">&times;</button>
							          <strong>Advertisement submitted for approval. Once approved, it will be published. </strong>
							        </div>
							        <div class="col-md-2"></div>
							      
							  ';

						}
						else {
							echo '
							        
							        <div class=" my-alert1 col-md-10 alert alert-dismissible btn-close" style="margin-left:200px; height:50px;background: red !important;">
							          <button type="button" class="close hiding" data-dismiss="alert"style="border:1px solid black; height:100%; width:50px; ">&times;</button>
							          <strong>This add is already publshed!!!</strong>
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

				     <div class=" col-md-6 my-form" >
						<h1 class="text-center" style="margin-top:10px;" >Publish New Ad</h1>
						<div class="line"></div>
	                    <form action="create-ad.php" class="create-ad" method="POST"  name="">
						  <fieldset >
						        <div class="form-group">
							      <label for="title">Title: </label>
							      <input type="text" class="form-control" name="title"id="title"  required>
							      
						        </div>
						        <div class="form-group" style="height: 150px;">
							      <label style="height: 150px; vertical-align: middle;">Text:</label>
							      <textarea name="content" rows="10"  style="width:75%; margin-left:10px; resize: none;"></textarea>

							      
							    </div>
							    <div class="form-group">
							      <label>Image:</label>
							      <strong id="txtFile"></strong>
							      <input type="file" name="img" class="form-control" id="image"  style=" visibility: hidden; position: absolute; ">
							      <label for="image" id="browse">
							      	<strong>
							      		Browse...
							      	</strong>
							      </label>
							      <input type="text" id="res" name="result">
							      <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
							    </div>
							    <div class="form-group">
							      <label for="exampleSelect1">Category:</label>
							      <?php
							      $category=showCategories();
							       echo '<select  id="exampleSelect1" name="categories" required>';
		                            for ($i=1; $i<count($category); $i++){
		                            	echo' <option value="'.$i.'">'.$category[$i]['category_name'].'</option>';					     
		                            }
		                             echo '</select>';
							      ?>
							    </div> 
							    <div class="form-group">
							      <label for="exampleSelect1">Town:</label>
							      <?php
							      $towns=showTowns();
							       echo '<select  id="exampleSelect1" name="towns" required>';
		                            for ($i=1; $i<count($towns); $i++){
		                            	echo' <option value="'.$i.'">'.$towns[$i]['town_name'].'</option>';
							     
		                            }
		                             echo '</select>';
							      ?>
							    </div> 
							    <button type="submit" class=" btn btn-primary publish">Publish </button>
						        <button type="submit" class=" btn btn-primary cancel" onclick="history.back();">Cancel</button>
							
						  </fieldset>
						</form>
					</div>
					<script>
						$("#image").change(function() {
						  filename = this.files[0].name
						  $('#res').val(filename);
						});
					</script>
									
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

