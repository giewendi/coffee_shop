<?php
  require '../config.php';
  if(!empty($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE User_id = $id"));
    
    //Must have selected product
    if(!empty($_SESSION["product_id"])){
      $id = $_SESSION["product_id"];
      $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE Product_ID = '".$id."'"));
      
      // PHP FOR ORDERING ADD ONS PART
      if(isset($_POST["submit"])){
        if(!empty($_POST["add_ons"])){
          $_SESSION["addons_id"] = $_POST["add_ons"];
          $_SESSION["quantity"] = $_POST["quantity"];
          header("Location: ../order/order.php");
        }
        else{
          echo
          "<script> alert('Select an Add On or select None.'); </script>";
        }
      }
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
    <style>
      .create{
      height: 100vh;
      overflow-x: hidden;
      background-size: cover;
      background-color: #E2BB7B;
      }
      .add{
      background-color: white;
      color: #000000;
      border: 1px solid #63462D;
      box-shadow: 3px 3px 7px #A47449;
      width: 20px;
      height: 40px;
      padding-bottom: 7px;
      }
      .type{
        margin-top: 10px;
      }
      .name{
        margin-top: 18px;
        margin-right: 80px;
      }
      .price{
        margin-left: -50px;
        margin-bottom: 30px;
      }
      .quantity{
        top: 465px;
        left: 950px;
        position: absolute;
      }
      .q{
        color: #000000;
        top: 465px;
        left: 850px;
        position: absolute;

      }
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
    <title>Add ons</title>
</head>
<body>
  <div class="create">
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
								  <li><a href="../logout.php">Logout</a></li>
								</ul>
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			</header><!-- #header -->
      <br><br><br><br>

      <div class="container align-items-center justify-content-center">
      <h1 style="text-align:center;">Add ons</h1> <hr />
	  	<div class="col-lg-4" style="margin-left:auto;margin-right:auto;">
			  <div class="single-menu">
				  	<div class="title-div justify-content-between d-flex">
					  <h1><?php echo $row['Product_Name'];?></h1>
					  <p class="price float-right">₱<?php echo $row['Product_Price'];?> </p>
					</div>
					<p>Size: <?php echo $row['Product_Type'].  '</b>&nbsp&nbsp |&nbsp&nbsp'. $row['Description']; ?></p>
				</div>
		</div>	
        <div class="row">
            <?php
              if($result = mysqli_query($conn, "SELECT * FROM add_ons")){
                while($row = mysqli_fetch_array($result)){
                  echo '<div class="add col-md-4 cil-sm-6 item">
                    <form class="" method="POST" action="" autocomplete="off">
                      <input  type="radio" id="' .$row["Addons_ID"]. '" name="add_ons" value="' .$row["Addons_ID"]. '">
                      <label style="padding: 15px;" for="' .$row["Addons_ID"]. '">'.$row["Addons_Name"]. ' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPrice:&nbsp ₱'. $row["Addons_Price"].
                  '</label>
                  </div>';
                }
              }else{
                echo "Oops! Something went wrong. Please try again later.";}
            ?>
			<div style="margin-left:auto;margin-right:auto;">
				<br><label for="quantity">Quantity: </label>
				<input type="number" id="quantity" name="quantity" min="1" max="5" value="1" height=1em><br><br>
				<button class="btn btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit">Confirm Order</button>
			</div>
            
          </form>
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
</body>
</html>