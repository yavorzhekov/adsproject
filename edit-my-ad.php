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
   /* #header > nav{
  	background:#daa600 !important;
  }*/
  	div#main-content{
  		margin-bottom:40px;
  	}
  	div.bordered{
  		border:1px solid #507e32;
  		width:100% !important;
  	}
  	input#image + label {
	  	/*max-width: 100%;
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
		right:20%;
*/
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
		right:20%;

  	}
  	input#res {
  		width: 50%;
  	}
    div.admin-form form fieldset input[type=submit]{
    width:10vw;
    }
  
  </style>
</head>
<body>

	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Ads – Edit Ad</h1>
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
			<div class="col-md-2 left-part" >
				<div class="card mb-3 bordered" >
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
		    

				     <div class=" col-md-7 my-form admin-form" style="margin-top:10px; margin-left:10%">
				     	<?php
				     	 $i=$_GET['id'];
                         $currentAd=adInfo2($i);
                         $category=showCategories();
                         $towns=showTowns();
                         
						echo '<h1 class="text-center" style="margin-top:10px;" >Edit Ad</h1>
						<div class="line"></div>
	                    <form action="update-my-ad.php?id='.$currentAd[0]['ad_id'].'" class="create-ad" method="POST"  name="">
						  <fieldset >
						        <div class="form-group">
							     <label for="title">Title: </label>
							     <input type="text" class="form-control" name="title" id="title"
							     value="'.$currentAd[0]['ad_title'].'"  required>
						        </div>
						        <div class="form-group" style="height: 150px;">
							      <label style="height: 150px; vertical-align: middle;">Text:</label>
							      <textarea rows="10" rows"10" style="width:75%; height:100%; font-size:20px; margin-left:10px;resize:none;" 
							     name="content" > '.$currentAd[0]['ad_text'].'</textarea>
							    </div>
							    <div >
							      <label>Image:</label>
							      <strong id="txtFile"></strong>
							      <input type="file" name="img" class="form-control" id="image"  style=" visibility: hidden; position: absolute; ">
							      <label for="image" id="browse">
							      	<strong>
							      		Browse...
							      	</strong>
							      </label>
							      <input type="text" id="res" value="'.$currentAd[0]['ad_image'].'"name="result">
							     
							    </div>
							     ';
						        
							    echo '<div class="form-group">
							      <label for="exampleSelect1">Category:</label>
							      <select  id="exampleSelect1" name="categories" required >';
							       echo' <option value="'.$currentAd[0]['category_id'].'">'.$currentAd[0]['category_name'].'</option>';
		                      
							       foreach($category as $key) { 

							       	
							       		
							       		 if($currentAd[0]['category_name']==$key['category_name']){
                                         	continue;
                                       }
							       	 echo' <option value="'.$key['category_id'].'">'.$key['category_name'].'</option>';

							         }
		                        echo '</select>
							      
							    </div> 
							    <div class="form-group">
							      <label for="exampleSelect1">Town:</label>
							      <select  id="exampleSelect1" name="towns" required>';
							       echo' <option value="'.$currentAd[0]['town_id'].'">'.$currentAd[0]['town_name'].'</option>';
		                            foreach($towns as $key) { 

							       	
							       		
							       		 if($currentAd[0]['town_name']==$key['town_name']){
                                         	continue;
                                       }
							       	 echo' <option value="'.$key['town_id'].'">'.$key['town_name'].'</option>';

							         }
		                             echo '</select>
		                       </div>  ';
						               ?>
							  
							    
							      <section style="margin-top:-60px; margin-left: 22%;">
							    	<a><input type="submit" class=" btn btn-primary " value="Edit" ></a>
						            <a><input type="submit" class=" btn btn-primary " onclick="history.go(-1);" value="Cancel"></a>
							      </section>
						  </fieldset>
						</form>
					</div>

					
		<div class="col-md-3"> </div>
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
<script type="js/jquery_ui.js"></script>
<script type="js/jquery-3.3.1.min.js"></script>
</body>
</html>