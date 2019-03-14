<?php session_start();
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
         background:#daa600;
         border:1px solid #7f6000;
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
               <h1>Ads - Login</h1>
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
                           <a href="index.php" >Home</a>
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
            <div class="col-md-2"></div>
            <div class="col-md-3">
               <?php 
                  if(isset($_GET['msg'])) {
                  	if($_GET['msg'] == 'wr') {
                  		echo '<div class="alert alert-dismissible alert-danger close-div my-alert" > 
                  		<button type="button" class="close hide-btn" style="border:1px solid black; height:100%; width:50px;">X</button>
                  		  <strong>Invalid Login.</strong>
                  		</div>';
                  	}
                  }
                  ?>
               <script>
                  $('.hide-btn').click(function() {
                  	$('.close-div').hide();	
                  });
               </script>
               <div class="login-form">
                  <h1 class="text-center">Login</h1>
                  <div class="line"></div>
                  <form action="log.php" method="POST">
                     <fieldset>
                        <div class="form-group">
                           <label for="text-input">Usename</label>
                           <input type="text" class="form-control" name="username" id="text-input" placeholder="" required>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Password</label>
                           <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn ">Login</button>
                        <a href="register.php"> Register here </a>
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
   </body>
</html>