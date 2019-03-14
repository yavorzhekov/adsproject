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
  	<script src="js/jquery.js"></script>
  <style >
  #header > nav{
  	background:#daa600 !important;
  }
  div.new-cat a{
  	display: inline-block;
	background: #6fab46;
	font-size: 20px;
	color: #fff;
	border-radius: 10px;
	margin:15px 0 30px 230px;
	padding: 10px 20px;
	border: 1px solid #507e32;
	overflow-wrap: break-word;
  }
  div.my-pagination{
  	width:520px !important;
  	position:relative;
	left: calc(55% - 520px / 2);
     }
  </style>
</head>
<body>

	<div id="wrapper" class="container-fluid">
	  <!-- Header starts -->
		<header id="header">
			<nav class="navbar bg-primary">
			  	<h1 class="col-md-10 text-center">Ads Administration - Categories</h1>
			  	<?php
			  	$allCategories = showCategories();
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
					    <a href="admin-view-categories.php" style="background: #daa600;">Categories</a>
					  </li>
					  <li>
					    <a href="admin-view-towns.php">Towns</a>
					  </li>
					</ul>
				  </nav>
				</div>
				
			</div>
			 <div class="col-md-1"></div>
			
            <div class=" my-table col-md-6 ">
            	<section>
            		<table class="table table-hover">
					  <thead>
					    <tr style="border-bottom:1px solid red;">
					      <th scope="col" >Id</th>
					      <th scope="col">Category</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  <?php
                        if(isset($_GET['id'])) {
				    	$pageId = $_GET['id'];
				    } else {
				    	$pageId = 1;
				    }
				     $catsOnPage = 5;
				     $categories = showCategories();
				     $pages = ceil(count($categories)/$catsOnPage );
				     
				   
				    $allCategories = showCategories($catsOnPage, $pageId);
				    
				   
                       
					   foreach ($allCategories as $categ) {
					   	if ($categ['category_name']=='All'){
					   		continue;
					   	}

					  	if($categ % 2 == 0 ) {
					  		echo '<tr class="table-active">
					      <td scope="col">'.$categ['category_id'].'</td>
					      <td>'.$categ['category_name'].'</td>
					      <td> 
					      	<a href="admin-edit-category.php?id='.$categ['category_id'].'&cat_n='.$categ['category_name'].'">Edit</a>
					      	<a href="admin-delete-category.php?id='.$categ['category_id'].'&cat_n='.$categ['category_name'].'">Delete</a>
					      </td>
					    </tr>';
					  	}	
					    else {
					    	echo '<tr>
					      <td scope="col">'.$categ['category_id'].'</td>
					      <td>'.$categ['category_name'].'</td>
					      <td> 
					      	<a href="admin-edit-category.php?id='.$categ['category_id'].'&cat_n='.$categ['category_name'].'">Edit</a>
					      	<a href="admin-delete-category.php?id='.$categ['category_id'].'&cat_n='.$categ['category_name'].'">Delete</a>
					      </td>
					    </tr>';
					    }
					    }

					   
					  echo'</tbody>
                    </table> 
            	</section>';
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
            echo '  <div class=" paging my-pagination  ">
				  	     <ul class="pagination ">
					    <li class="page-item" >
					      <a class="page-link" href="admin-view-categories.php?id=1" >First</a>
					    </li>
					    <li class="page-item">
					      <a class="page-link" href="admin-view-categories.php?id='.$prev.'">Previous</a>
					    </li>
					    ';
					    for($i = $fromPage; $i <=$toPage; $i++) {
					    	
					    		echo '<li class="page-item">
									      <a class="page-link" href="admin-view-categories.php?id='.$i.'">'.$i.'</a>
									    </li>';
					    	
					    }
					    if($pageId+1 <= $pages){
					    	$next = $pageId+1;
					    } else {
					    	$next = $pages;
					    }
					    echo '
					    <li class="page-item">
					      <a class="page-link" href="admin-view-categories.php?id='.$next.'">Next</a>
					    </li>
					    <li class="page-item">
					      <a class="page-link" href="admin-view-categories.php?id='.$pages.'">Last</a>
					    </li>
				  </ul>
				</div>'; 
				?>
				<div class="new-cat">
				 <a href="admin-create-category.php"> Create New Category </a>
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
<script> 
	var pageId= <?php echo json_encode($pageId); ?>;
	$(".pagination li").each(function(){
		if($(this).children("a").html()==pageId){
           $(this).children("a").css("background", "#6FAB46");
		}
	})
</script>
</body>
</html>
