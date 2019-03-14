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
  		width:100% !important;
  	}
  	div.admin-form form fieldset div{
  		margin-bottom:3%;
  	}
  	div.admin-form form fieldset div input,
  	div.admin-form form fieldset div select{
  		width:50%;
  		display:inline-block;
  		margin-left:20px;
  		
  	}
  	div.admin-form form fieldset div label{
  		text-align:right;
  		width:10%;
  		margin-left:14%;
  	}
  	
  	div.admin-form form fieldset div.btns input{
  		width:15%;
  		
  	}
  	
  	input#image + label {
  		
	  	max-width:13%;
	  	min-width:11%;
	  	width:12%;
	  	padding:6px;
        text-align:center;
		display: inline-block;
		background: #6fab46;
		font-size: 19px;
		color: #fff;
		border-radius: 10px;
		border: 1px solid #507e32;
		overflow-wrap: break-word;
		cursor:pointer;
		position: absolute;
		right:24.2%;
		top:41.5%;
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
			  	<h1 class="col-md-10 text-center">Ads Administration - Edit ad</h1>
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
		    

				     <div class=" col-md-7 my-form admin-form" style="margin-top:10px; margin-left:7%;">
				     	<?php
				     	 $i=$_GET['id'];
                         $currentAd=adInfo2($i);
                         $category=showCategories();
                         // echo'<pre>';
                         // print_r($category);   
                         //  echo'<pre>';
                         $towns=showTowns();
            //                echo '<pre>';
				        // print_r($currentAd);
				        //   echo '</pre>';
                        
						echo '<h1 class="text-center" style="margin-top:10px;" >Edit Ad</h1>
						<div class="line" ></div>
	                    <form action="admin-update-ad.php?id='.$currentAd[0]['ad_id'].' class="create-ad" method="POST"  name="">
						  <fieldset >
						        <div class="form-group" style="margin-top:40px;">
							     <label for="title">Title: </label>
							     <input type="text" class="form-control" name="title" id="title"
							     value="'.$currentAd[0]['ad_title'].'"  required>
						        </div>
						        <div class="form-group" style="height: 150px;">
							      <label style="height: 150px; vertical-align: middle;">Text:</label>
							      <textarea rows="10" style="width:50%;  height:100%; font-size:20px; margin-left:20px;resize:none;" 
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
							      <input type="text" id="res" value="'.$currentAd[0]['ad_image'].'"name="result" style="width:30%;">
							     
							    </div>
							     <div class="form-group">
							      <label for="title">Username: </label>
							      <input type="text" class="form-control" name="user" id="user"
							       value="'.$currentAd[0]['member_username'].'"  disabled>
						        </div>';
						        
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
							  
							    </div> 
							     <div class="form-group">
							      <label for="exampleSelect1">Status: </label>
							      <select  id="exampleSelect1" name="status" required >';
							        echo' <option value="'.$currentAd[0]['ad_status'].'">'.$currentAd[0]['ad_status'].'</option>';
							      	echo'
							      	<option  value="Published">Published</option>
							      	<option value="Rejected">Rejected</option>
							      	<option value="Inactive">Inactive</option>
							      </select>
						        </div>
						        <div class="form-group">
							      <label for="date">Date: </label>
							      <input type="date" class="form-control" name="date"id="date" value="'.$currentAd[0]['ad_date'].'"   required>
						        </div>
						        <div class="btns">
							    <input type="submit" class=" btn btn-primary publish" value="Edit" style="margin-left:34%; margin-right:3%;">
						        <input type="submit" class=" btn btn-primary cancel" onclick="history.back();" value="Cancel" >
						        </div>
							
						  </fieldset>
						</form>';
						?>
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
<script type="js/jquery_ui.js"></script>
<script type="js/jquery-3.3.1.min.js"></script>
</body>
</html>

