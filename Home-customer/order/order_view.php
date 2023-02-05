<?php
	require '../config.php';
	if(!empty($_SESSION["user_id"])){
		$id = $_SESSION["user_id"];
		$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE User_id = $id"));
        if(!empty($_SESSION["order_id"])){
            $order_id = $_SESSION["order_id"];
            $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cart WHERE Order_ID = $order_id"));
        }
        else{
            header("Location: ../index.php");
        }
	}
	
	else{
		header("Location: ../../logout.php");
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
		<title>Order View</title>

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
            body {
                text-align: center;
                padding: 40px 0;
                background: #e6c497;
            }
                h1 {
                color: #88B04B;
                font-weight: 900;
                font-size: 40px;
                margin-bottom: 10px;
                }
                p {
                color: #404F5E;
                font-size:20px;
                margin: 0;
                }
            i {
                color: #9ABC66;
                font-size: 100px;
                line-height: 200px;
                margin-left:-15px;
            }
            .card {
                background: white;
                padding: 40px;
                border-radius: 4px;
                box-shadow: 0 2px 3px #C8D0D8;
                display: inline-block;
                margin: 0 auto;
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
								  <li><a href="../order/order_History.php">Order History</a></li>
								  <li><a href="../../logout.php">Logout</a></li>
								</ul>
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
            </header>
            <br><br><br><br><br>
                    
            <div class="container">
                    <div class="card">
                        <h1><?php echo 'Order ID '.$order_id. ' Overview'?></h1> <hr />

                        <?php $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE product_id = (SELECT Product_ID FROM cart WHERE Order_ID='$order_id');"));?>
                        <div class="form-group">    
                            <label>Coffee</label>
                            <p><b> <?php echo $row["Product_Name"]; ?> | <?php echo strtoupper($row["Product_Type"]); ?></b></p>
                        </div>

                        <?php $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM add_ons WHERE Addons_ID = (SELECT Addons_ID FROM cart WHERE Order_ID='$order_id');"));?>
                        <div class="form-group">    
                            <label>Coffee</label>
                            <p><b> <?php echo $row["Addons_Name"];?></b></p>
                        </div>

                        <?php $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `order` WHERE `Order_ID` = '$order_id'"));?>
                        <div class="form-group">    
                            <label>Date and Time Ordered</label>
                            <p><b> <?php echo $row["Time_Ordered"]; ?></b></p>
                        </div>


                        <?php $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cart WHERE Order_ID = '$order_id'"));?>   
                        <div class="form-group">    
                            <label>Quantity</label>
                            <p><b> <?php echo $row["Quantity"]; ?></b></p>
                        </div>
                        
                        <div class="form-group">    
                            <label>Total Amount</label>
                            <p><b>₱ <?php echo $row["Subtotal"]; ?>.00</b></p>
                        </div>

                        <a href="../index.php"><input type="submit" class="btn btn-dark" style="background:#B68734; border-style: none;" value="Home"></a>
                        <a href="order_history.php" class="btn btn-dark" style="background:#433533; border-style: none;">Back</a>
                        
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
</body>
</html>

