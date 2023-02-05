<?php
  require 'config2.php';
  if(!empty($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE User_id = $id");
    $row = mysqli_fetch_assoc($result);
  }
  else{
    header("index.php");
  }
?>
<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Coffee</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">			
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
    <style>
    .profile-head {
    transform: translateY(5rem)
    }

    .cover {
        background-image: url(https://picsum.photos/200/300);
        background-size: cover;
        background-repeat: no-repeat
    }

    body {
        background: linear-gradient(90deg, rgba(230,196,151,1) 0%, rgba(173,137,101,1) 58%, rgba(130,88,58,1) 100%);
        min-height: 100vh;
        overflow-x:hidden;
    }
    </style>
</head>
<body>
            <header id="header" id="home" style="background: #433533;">
				<div class="header-top">
		  			<div class="container">
				  		<div class="row justify-content-end">
				  			<div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">
				  				<ul>
				  					<li>
				  						Mon-Fri: 8am to 8pm
				  					</li>
				  					<li>
				  						Sat-Sun: 11am to 11pm
				  					</li>
				  					<li>
				  						<a href="tel:(012) 6985 236 7512">(+63) 912 345 6789</a>
				  					</li>				  					
				  				</ul>
				  			</div>
				  		</div>			  					
		  			</div>
				</div>			  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="../index.php"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="../index.php">Home</a></li>
						  <li class="menu-has-children"><a href="">
							  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
								  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
							  </svg></a>
							  	<ul style="width: 150px;">
								  <li><a href="../../logout.php">Logout</a></li>
								</ul>
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			</header><!-- #header -->
            <div class="row py-5 px-4" style="margin-top: 80px;">
                <div class="col-md-5 mx-auto">
                    <!-- Profile widget -->
                    <div class="bg-white shadow rounded overflow-hidden">
                        <div class="px-4 pt-0 pb-4 cover">
                            <div class="media align-items-end profile-head">
                                <div class="profile mr-3">
                                    <img src="https://picsum.photos/200" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                                    <a href="update.php" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a>
                                </div>
                                <div class="media-body mb-5 text-white">
                                    <h3 class="mt-0 mb-0" style="color: white; text-shadow: 2px 2px 2px #000000;"><?php echo $row["First_Name"];?> <?php echo $row["Last_Name"];?></h3>
                                    <h4 class="small mb-4" style="color: white; font-size: 15px; text-shadow: 2px 2px 1px #000000;"> <i class="fas fa-map-marker-alt mr-">
                                    </i><?php echo $row["City_Address"];?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 d-flex justify-content-end text-center">
                            
                        </div>
                        <div class="px-4 py-3">
							<br>
							<p><?php if(!empty($_SESSION["updated"])){echo$_SESSION['updated'];unset($_SESSION["updated"]);} ?></p>
                            <h5 class="mb-0">About</h5>
                            <div class="p-4 rounded shadow-sm bg-light">
								<p>First Name: <b><?php echo $row['First_Name'];?></b></p>
								<p>Last Name: <b><?php echo $row['Last_Name'];?></b></p>
								<p>User ID: <b><?php echo $row['User_ID'];?></b></p>
								<p>User Type: <b><?php echo $row['User_Type'];?></b></p>
								<p>Email Address: <b><?php echo $row['Email'];?></b></p>
								<p>Phone Number: <b><?php echo $row['Phone_Num'];?></b></p>
                                <p>Address: <b><?php echo $row['City_Address'];?> <?php echo $row['ZIP_Code'];?></b></p>
                            </div>
                        </div>
                        
                    </div>
            </div>

            <script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/mail-script.js"></script>				
			<script src="js/main.js"></script>
</div>
</body>
</html>