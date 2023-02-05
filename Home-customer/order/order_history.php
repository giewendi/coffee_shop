<?php
	require '../config.php';
	if(!empty($_SESSION["user_id"])){
		$id = $_SESSION["user_id"];
		$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE User_id = $id"));
		
		// Pay
		if(isset($_POST["submit_pay"])){
			if(!empty($_POST["submit_pay"])){
				$_SESSION["order_id"] = $_POST["submit_pay"];
				header("Location: ../payment/payment.php");
			}
			else{
				echo
				"<script> alert('Error'); </script>";
			}
		}
        // View
        if(isset($_POST["submit_view"])){
			if(!empty($_POST["submit_view"])){
				$_SESSION["order_id"] = $_POST["submit_view"];
				header("Location: order_view.php");
			}
			else{
				echo
				"<script> alert('Error'); </script>";
			}
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
            <title>Order History</title>

			<style>
				body {
					text-align: center;
					padding: 40px 0;
					background: #e6c497;
				}
				.add{
					
					height: 40px;
					padding: 7px;
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
            <br><br><br><br>

            <div class="container">
            <h1 style="text-align: center;">Order History</h1> <hr />
				<div class="row justify-content-center" style="">
					<?php
					$id = $_SESSION["user_id"];
					if($result = mysqli_query($conn, "SELECT * FROM `cart` WHERE `Order_ID` IN (SELECT `Order_ID` FROM `order` WHERE `User_ID` = '".$id."' ) AND `Order_ID` NOT IN (SELECT `Order_ID` FROM `payment`);")){
						echo '<div class="add col-md-4 cil-sm-6 item justify-content-center">';
							echo '<h2>Unpaid Orders</h2> <br>';
							echo '<table class="unpaid" style="margin-left:100px;">
									<tr>
										<b><th>Order ID</th>
										<th>Total</th>
										<th>Action</th></b>
									</tr>
							';
							while($row = mysqli_fetch_array($result)){
								$order_id = $row["Order_ID"];
									echo '<tr>
											<td>'.$order_id.'</td>
											<td>₱ '.$row["Subtotal"].'</td>
											<td>
											<form class="" method="POST" action="" autocomplete="off">
													<button class="" type="submit" name="submit_pay" value="'.$order_id.'"">Pay now</button>
												</form>
											</td>
										</tr>';
							}
							echo '</table>';
						echo '</div>';
					}
						if($result = mysqli_query($conn, "SELECT * FROM `order` WHERE `User_ID` = '$id'")){
							echo '<div class="add col-md-4 cil-sm-6 item  justify-content-center">';
								echo '<h2>All Orders</h2><br>';
								echo '<table class="all" style="margin-left:40px;">
										<tr>
											<b><th>Order ID</th>
											<th>Date and Time of Order</th>
											<th>Action</th></b>
										</tr>
								';
								while($row = mysqli_fetch_array($result)){
									$order_id = $row["Order_ID"];
									echo '<tr>
											<td>'.$order_id.'</td>
											<td>'.$row["Time_Ordered"].'</td>
											<td>
											<form class="" method="POST" action="" autocomplete="off">
													<button class="" type="submit" name="submit_view" value="'.$order_id.'"">View</button>
												</form>
											</td>
										</tr>';
								}
							echo '</div>';
						}
					?>
					
					</table>
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

