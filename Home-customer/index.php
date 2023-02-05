<?php
	require '../config.php';
	if(!empty($_SESSION["user_id"])){
		$id = $_SESSION["user_id"];
		$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE User_id = $id"));
		
		// PHP FOR ORDERING
		if(isset($_POST["submit"])){
			if(!empty($_POST["menu"])){
				$_SESSION["product_id"] = $_POST["menu"];
				header("Location: ./add_ons/add_ons.php");
			}
			else{
				echo
				"<script> alert('Select your coffee first.'); </script>";
			}
		}
	}
	
	else{
		header("Location: ../logout.php");
	}
?>


<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
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
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">

		<style>
			.gradient-custom-2 {
			/* fallback for old browsers */
			background: #fccb90;

			/* Chrome 10-25, Safari 5.1-6 */
			background: -webkit-linear-gradient(to right, #E6C497, #AD8965, #82583A, #78492B);

			/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			background: linear-gradient(90deg, rgba(230,196,151,1) 0%, rgba(173,137,101,1) 58%, rgba(130,88,58,1) 100%);
			}

			.btn-outline-light {
			background: linear-gradient(90deg, rgba(230,196,151,1) 0%, rgba(173,137,101,1) 58%, rgba(130,88,58,1) 100%);
			border: linear-gradient(90deg, rgba(230,196,151,1) 0%, rgba(173,137,101,1) 58%, rgba(130,88,58,1) 100%);
			outline: linear-gradient(90deg, rgba(230,196,151,1) 0%, rgba(173,137,101,1) 58%, rgba(130,88,58,1) 100%);
			}

			@media (min-width: 768px) {
			.gradient-form {
			height: 100vh !important;
			}
			}
			@media (min-width: 769px) {
			.gradient-custom-2 {
			border-top-right-radius: .3rem;
			border-bottom-right-radius: .3rem;
			}
			}
		</style>

		</head>
		<body>

			  <header id="header" id="home">
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
				        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="#home">Home</a></li>
				          <li><a href="#about">About</a></li>
				          <li><a href="#coffee">Coffee</a></li>
						  <li><a href="#gallery">Gallery</a></li>
				          <li><a href="#review">Review</a></li>
						  <li class="menu-has-children"><a href="">
							  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
								  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
							  </svg></a>
							  	<ul style="width: 150px;">
								  <li><a href="Profile/profile.php">Profile List</a></li>
								  <li><a href="order/order_history.php">Order History</a>
								  </li>
								  <li><a href="../logout.php">Logout</a></li>
								</ul>
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area" id="home">	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-7">
							<h5 class="text-white text-uppercase" style="margin-top: 130px; letter-spacing: 1px;">Welcome <?php echo $row["First_Name"]; ?>!</h5>
							<h1 style="font-size:50px; color:white; margin: 20px 0px; letter-spacing: 2px;">
								We don’t just make your coffee.<br>
								We make your day smoothly.				
							</h1>
							<a href="#coffee" class="primary-btn text-uppercase">Buy Now</a>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start video-sec Area -->
			<section class="video-sec-area pb-160 pt-40" id="about">
				<div class="container">
					<div class="row justify-content-start align-items-center">
						<div class="col-lg-4 video-right justify-content-center align-items-center d-flex"></div>						
						<div class="col-lg-8 py-5 video-left" style="margin-top: 20px;">
							<h6>ABOUT DEJA BREW</h6>
							<h1>We are Deja Brew.<br>
							Your Homegrown Brew.</h1>
							<p><span>We believe that the Philippines is rich in culture and artistry. We are proud of our roots.</span></p>
							<p>
							The Deja Brew provides a business and School works hub where professionals and students in all industries can come to grab some coffee, hold a meeting, meet for lunch or put in a full day of work. Our experienced baristas, professional support staff and convenient location an energetic atmosphere to your day-to-day business needs. And not only you can work, print, scan and meet other people. In 2014, we decided to take the jump and open The Deja Brew and build our dream. As blueprints and business plans became reality, we both knew one of our key principals would be sustainable philanthropy. So we decided to team up with charities we love and pay our own success forward to those who need a little help. We want everyone we meet to feel welcome in a place where they can work, laugh, or bond– A place to call home.

							</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End video-sec Area -->
			
			<!-- Start menu Area -->
			<section class="menu-area section-gap" id="coffee">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">What kind of Coffee we serve for you</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>				
					<div class="row">
							<?php
								if($result = mysqli_query($conn, "SELECT * FROM product")){
									while($row = mysqli_fetch_array($result)){
										echo '<div class="col-lg-4">
											<form class="" method="POST" action="" autocomplete="off">
												<input type="radio" id="' .$row["Product_ID"]. '" name="menu" value="' .$row["Product_ID"]. '">
												<label for="' .$row["Product_ID"]. '">
													<div class="single-menu">
														<div class="title-div justify-content-between d-flex">
															<h4>'. $row['Product_Name'].'</h4>
																<p class="price float-right"> ₱'.
																	$row['Product_Price'].
																'</p>
														</div>
															<p>Size:&nbsp&nbsp <b>'. strtoupper($row['Product_Type']). '</b>&nbsp&nbsp |&nbsp&nbsp 
																'. $row['Description'].													
															'</p>
													</div></label></div>';
									}
								}else{
									echo "Oops! Something went wrong. Please try again later.";}
							?>
							<button class="btn btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit">Place an Order</button>
						</form>

						<style>
							input[type=radio]{
								display:none;
							}
							label{
								all: unset;
							}
							input[type="radio"] + label {
								position: relative;
								padding-left: 100%;
								cursor:pointer;
								font-size: 22px;
							}
							input[type="radio"]:checked+label{
								background-color: #6f4e37;
							}
						</style>
				</div>
			</section>
			<!-- End menu Area -->
			
			<!-- Start gallery Area -->
			<section class="gallery-area section-gap" id="gallery">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Gallery</h1>
								<p>Who are in extremely love with coffee.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-4">
							<a href="img/g1.jpg" class="img-pop-home">
								<img class="img-fluid" src="img/g1.jpg" alt="">
							</a>	
							<a href="img/g2.jpg" class="img-pop-home">
								<img class="img-fluid" src="img/g2.jpg" alt="">
							</a>	
						</div>
						<div class="col-lg-8">
							<a href="img/g3.jpg" class="img-pop-home">
								<img class="img-fluid" src="img/g3.jpg" alt="">
							</a>	
							<div class="row">
								<div class="col-lg-6">
									<a href="img/g4.jpg" class="img-pop-home">
										<img class="img-fluid" src="img/g4.jpg" alt="">
									</a>	
								</div>
								<div class="col-lg-6">
									<a href="img/g5.jpg" class="img-pop-home">
										<img class="img-fluid" src="img/g5.jpg" alt="">
									</a>	
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End gallery Area -->
			
			<!-- Start review Area -->
			<section class="review-area section-gap" id="review">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Reviews</h1>
								<p>Feedbacks from our lovely customers.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-6 col-md-6 single-review">
							<img src="img/r1.JPG" style="width: 80px; border-radius:100%;" alt="">
							<div class="title d-flex flex-row">
								<h4>Riza Tallas</h4>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>								
								</div>
							</div>
							<p>
								I would like to give a huge shoutout to the Deja Brew employees. All of their employees are super friendly, efficient and always remember my drink combo. Me and my husband have been going to that Shop for six years now and we love our Baristas. Most days, there is only one Barista tending to the store but they are always efficient and seem to do an amazing job single handedly. I would like to give a special shoutout to Cj, He always greets me with a smile and a funny story, which makes my day amazing. Thank you, Cj for always being my ray of sunshine first thing in the morning.
							</p>
						</div>	
						<div class="col-lg-6 col-md-6 single-review">
							<img src="img/r2.jpg" style="width: 80px; border-radius:100%;"  alt="">
							<div class="title d-flex flex-row">
								<h4>Chey Hembrador</h4>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>								
								</div>
							</div>
							<p>
								I have never been a fan of coffee ever since I was a kid. I have tried a lot of them so I can understand why my friends are going gaga about it but I found myself more confused because I really do not like its taste. Until I tried one of the products of, Deja Brew. I think it was Piccolo Latte that I tried. Then I understood why they were so in love with coffee. I liked the taste. Not too sweet and not too leafy.
							</p>
						</div>	
					</div>
					<div class="row counter-row">
						<div class="col-lg-3 col-md-6 single-counter">
							<h1 class="counter">2536</h1>
							<p>Happy Client</p>
						</div>
						<div class="col-lg-3 col-md-6 single-counter">
							<h1 class="counter">7562</h1>
							<p>Total Projects</p>
						</div>
						<div class="col-lg-3 col-md-6 single-counter">
							<h1 class="counter">2513</h1>
							<p>Cups Coffee</p>
						</div>
						<div class="col-lg-3 col-md-6 single-counter">
							<h1 class="counter">10536</h1>
							<p>Total Submitted</p>
						</div>																		
					</div>
				</div>	
			</section>
			<!-- End review Area -->
			
			
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									In 2014, we decided to take the jump and open The Deja Brew and build our dream. As blueprints and business plans became reality, we both knew one of our key principals would be sustainable philanthropy.
								</p>
								<p class="footer-text">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>								
							</div>
						</div>					
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->	

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
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
</html>



